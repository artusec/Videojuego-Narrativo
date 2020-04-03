using System.Collections;
using System.Collections.Generic;
using UnityEngine;

[System.Serializable]
public struct SonarRadios
{
    public float cerca,
                medio,
                lejos;
    public AudioClip clickSound;
    public void setCerca(float nCerca) { cerca = nCerca; }
    public void setMedio(float nMedio) { medio = nMedio; }
    public void setLejos(float nLejos) { lejos = nLejos; }
    public void setAudio(AudioClip nAudio) { clickSound = nAudio; }
}

public enum SonarZones
{
    fuera,
    lejos,
    medio,
    cerca
}

public class SonarPuzzleManager : MonoBehaviour
{
    [Header("La fuera y duración de la vibración")]
    public float vibrationStrengh = 0.5f;
    public long vibrationDuration = 333;
    [Header("El tiempo que pasa entre vibraciones en cada zona")]
    public long vibrationRestCerca = 50;
    public long vibrationRestMedio = 333;
    public long vibrationRestLejos = 666;

    [Space(10)]

    //si en vez de querer buscar un solo item se quiere buscar varios objetos o similiar 
    //  se puede cambiar este atributo por una lista de índices
    [Header("Índice solución")]
    [Tooltip("El índice dentro del array de centros el cual es solución al minijuego")]
    public int solutionIndex = 0;

    [Tooltip("Los centros de los distintos focos de vibración")]
    [SerializeField]
    public List<Transform> centros;

    [Tooltip("Los radios de vibración de los distintos focos de vibración")]
    [SerializeField]
    public List<SonarRadios> radios;

    //controla si el raton esta pulsado o no
    private bool click = false;
    //auxiliar que detecta los cambios de zona para evitar repetir llamadas a funciones
    private SonarZones lastZone = SonarZones.fuera;
    //su propio componente para reproducir sonidos
    private AudioSource src;
    public AudioSource tapSound;
    //auxiliar que indica si hay que poner el sonido de ir tapeando
    private bool tapPlay = true;

    public AudioClip looseSound;
    public AudioClip winSound;

    public AudioClip introTTS;

    ScreenInput screenInput;

    private void OnValidate()
    {
        //nos aseguramos de valores de vibracion validos
        if (vibrationStrengh < 0)
            vibrationStrengh = 0;
        else if (vibrationStrengh > 1)
            vibrationStrengh = 1;
        if (vibrationDuration < 0)
            vibrationDuration = 0;
        //nos aseguramos que la lista de radios tiene el mismo tamaño que la de centros
        if(radios.Count != centros.Count)
        {
            //caso en el que la lista de radios es más pequeña que la de centros
            if(radios.Count < centros.Count)
            {
                //añadimos elementos a la lista de radios para que se nivele la diferencia
                for(int i =0; i< centros.Count - radios.Count; i++)
                    radios.Add(new SonarRadios());
            }
            //caso en el que la lista de radios es más grande que la de centros
            else
            {
                //quitamos elementos por atrás para nivelar la diferencia
                for(int i =0; i< radios.Count - centros.Count; i++)
                    radios.RemoveAt(radios.Count - 1);
            }
        }
        //ahora nos aseguramos que todos los radios tienen valores válidos (mayores o iguales a 0)
        for(int i = 0; i< radios.Count; i++)
        {
            if (radios[i].cerca < 0)
                radios[i].setCerca(0);
            if (radios[i].medio < 0)
                radios[i].setMedio(0);
            if (radios[i].lejos < 0)
                radios[i].setLejos(0);
        }

        //nos aseguramos que la solución es un índice válido
        if (solutionIndex < 0)
            solutionIndex = 0;
        else if (solutionIndex >= centros.Count)
            solutionIndex = centros.Count - 1;
    }

    private void Start()
    {
        screenInput = ScreenInput.instance;
        src = GetComponent<AudioSource>();
        if (src == null)
            throw new System.Exception("No se encontró el componente Audio Source para reproducir sonido");

        src.clip = introTTS;
        src.Play();
        screenInput.deactivate(introTTS.length);
    }

    //para ver los radios desde el editor
    private void OnDrawGizmos()
    {
        for(int i = 0; i< centros.Count; i++)
        {
            Gizmos.DrawWireSphere(centros[i].position, radios[i].cerca);
            Gizmos.DrawWireSphere(centros[i].position, radios[i].cerca + radios[i].medio);
            Gizmos.DrawWireSphere(centros[i].position, radios[i].cerca + radios[i].medio + radios[i].lejos);
        }

        if(click)
            Gizmos.DrawWireSphere(Camera.main.ScreenToWorldPoint(Input.mousePosition), 0.2f);
    }

    void Update()
    {
        click = Input.GetMouseButton(0);
        //move m = ScreenInput.instance.getInput();
        if (click)
            ProcessMouse(move.pressing);
        else
        {
            Vibration.Cancel();
            tapSound.Stop();
        }
        if(ScreenInput.instance.getInput() == move.click)
        {
            ProcessMouse(move.click);
        }
        else if(ScreenInput.instance.getInput() == move.doubleClick)
        {
            ProcessMouse(move.doubleClick);
        }
    }

    //calcula cual es el centro a menor distancia desde la posición del ratón y actúa en consecuencia
    //  según el move m que se le pase
    void ProcessMouse(move m)
    {
        Vector2 auxPos = Camera.main.ScreenToWorldPoint(Input.mousePosition);

        //infinito por defecto para asegurar que se ajusta el valor en la primera vuelta del bucle
        float minDist = Mathf.Infinity;
        float actDist = 0;
        int index = -1;
        //recorremos la lista
        for (int i = 0; i < centros.Count; i++)
        {
            //calculamos la distancia al centro correspondiente
            actDist = Vector2.Distance(auxPos, centros[i].position);
            //y si la distancia es menor 
            if (actDist < minDist)
            {
                //ajustamos variables
                minDist = actDist;
                index = i;
            }
        }

        switch (m)
        {
            case move.pressing:
                CalculateVibration(index, minDist);
                if(!tapSound.isPlaying && tapPlay)
                {
                    tapSound.loop = true;
                    tapSound.Play();
                }
                break;
            case move.click:
                ProcessClick(index, minDist);
                break;
            case move.doubleClick:
                ProcessDoubleClick(index, minDist);
                break;
            default:
                break;
        }
    }

    //procesa un click desde el centro cIndex más cercano, y si se ha hecho el click en el centro (determinado por dist)
    //  pasa a generar el sonido correspondiente
    void ProcessClick(int cIndex, float dist)
    {
        if (dist <= radios[cIndex].cerca)
        {
            print("centro clickado, reproduciendo sonido asociado al índice: " + cIndex.ToString());
            tapSoundStopTime(radios[cIndex].clickSound.length);
            src.PlayOneShot(radios[cIndex].clickSound);
        }
    }

    void ProcessDoubleClick(int cIndex, float dist)
    {
        //si el centro más cercano cumple la condición de distancia
        if(dist <= radios[cIndex].cerca) {
            //es la solución
            if (cIndex == solutionIndex)
            {
                src.Stop();
                tapSound.Stop();
                tapPlay = false;
                src.PlayOneShot(winSound);
                //src.clip = winSound;
                //src.Play();
                //indicamos que hemos ganado / conseguido el objeto
                print("VICTORIA");
                screenInput.deactivate(winSound.length);
                //-------------------------------------------------
                // Hacer lo que sea necesario para seguir el juego
                //-------------------------------------------------
                Invoke("onVictory", winSound.length);
                //onVictory();
            }
            //condición de derrota
            else
            {
                print("una vida menos");
                tapSound.Stop();
                tapPlay = false;
                src.Stop();
                src.PlayOneShot(looseSound);
                //src.clip =looseSound;
                //src.Play();
                ChangeRadius(cIndex, 0, 0, 0);
            }
        }
    }

    void onVictory()
    {
        int progress = GameManager.instance.room;
        switch (progress)
        {
            case 2:
                GameManager.instance.addItemToInv("LlavePequena2");
                GameManager.instance.setScenState("Estanteria2", 2);
                GameManager.instance.saveToTXT();
                GameManager.instance.changeScene("Room2");
                break;
            default:
                break;
        }
    }

    //calcula la vibración correspondiente dada la distancia dist al centro con indice cIndex dentro de la lista de centros
    void CalculateVibration(int cIndex, float dist)
    {
        if(dist <= radios[cIndex].cerca)
        {
            if (lastZone != SonarZones.cerca)
            {
                print("cerca");
                lastZone = SonarZones.cerca;
                Vibration.Cancel();
                Vibration.SonarVibration(vibrationStrengh, vibrationDuration, vibrationRestCerca, true);
            }
        }
        else if(dist <= (radios[cIndex].medio + radios[cIndex].cerca) )
        {
            if(lastZone != SonarZones.medio)
            {
                print("medio");
                lastZone = SonarZones.medio;
                Vibration.Cancel();
                Vibration.SonarVibration(vibrationStrengh, vibrationDuration, vibrationRestMedio, true);
            }
        }
        else if(dist <= (radios[cIndex].lejos + radios[cIndex].medio + radios[cIndex].cerca) )
        {
            if(lastZone != SonarZones.lejos)
            {
                print("lejos");
                lastZone = SonarZones.lejos;
                Vibration.Cancel();
                Vibration.SonarVibration(vibrationStrengh, vibrationDuration, vibrationRestLejos, true);
            }
        }
        else
        {
            if(lastZone != SonarZones.fuera)
            {
                lastZone = SonarZones.fuera;
                Vibration.Cancel();
            }
        }
    }

    private void tapSoundStopTime(float time)
    {
        tapSound.Stop();
        tapPlay = false;
        Invoke("tapSoundReady", time);
    }

    private void tapSoundReady()
    {
        tapPlay = true;
    }

    private void ChangeRadius(int index, float nCerca, float nMedio, float nLejos)
    {
        radios[index].setCerca(nCerca);
        radios[index].setMedio(nMedio);
        radios[index].setLejos(nLejos);
    }
}
