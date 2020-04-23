using System.Collections;
using System.Collections.Generic;
using UnityEngine;

//struct que maneja la información de un punto
[System.Serializable]
public struct SonarRadios
{
    //distancia de los radios de acción
    public float cerca,
                medio,
                lejos;
    public AudioClip clickSound;
    public void setCerca(float nCerca) { cerca = nCerca; }
    public void setMedio(float nMedio) { medio = nMedio; }
    public void setLejos(float nLejos) { lejos = nLejos; }
    public void setAudio(AudioClip nAudio) { clickSound = nAudio; }
}

//enumerado axuliar para llevar la cuenta de la posición actual
public enum SonarZones
{
    fuera,
    lejos,
    medio,
    cerca
}

public class SonarPuzzleManager : MonoBehaviour
{
    [Header("<Atributos de la vibración")]
    [Tooltip("la potencia de la vibración, en rango [0,1]")]
    public float vibrationStrengh = 0.5f;
    [Tooltip("El tiempo en milisegundos que está activa la vibración. En el radio céntrico la duración está fijada a 2000")]
    public long vibrationDuration = 333;
    [Header("El tiempo que pasa entre vibraciones en cada zona")]
    public long vibrationRestCerca = 0;
    public long vibrationRestMedio = 333;
    public long vibrationRestLejos = 666;

    [Space(10)]

    //si en vez de querer buscar un solo item se quiere buscar varios objetos o similiar 
    //  se puede cambiar este atributo por una lista de índices
    [Header("Atributos de juego")]
    [Tooltip("El índice dentro del array de centros el cual es solución al minijuego")]
    public int solutionIndex = 0;

    [Tooltip("Los centros de los distintos focos de vibración")]
    [SerializeField]
    public List<Transform> centros;

    [Tooltip("Los radios de vibración de los distintos focos de vibración, asociados en el mismo orden a la lista de centros")]
    [SerializeField]
    public List<SonarRadios> radios;

    private bool click = false;                     //controla si el raton esta pulsado o no
    private SonarZones lastZone = SonarZones.fuera; //auxiliar que detecta los cambios de zona para evitar repetir llamadas a funciones
    [Header("Atributos de audio")]
    private AudioSource src;                        //su propio componente para reproducir los sonidos al clickar
    [Tooltip("Audio que se reproducirá mientras se está haciendo drag")]
    public AudioSource tapSound;
    private bool tapPlay = true;                    //auxiliar que indica si hay que reproducir el audio tapSound

    public AudioClip looseSound;                    //se reproduce al hacer doble click en un punto no solución
    public AudioClip winSound;                      //se reproduce al hacer doble click en un punto solución
    public AudioClip winTTS;                        //se reproduce al ganar, justo después de winSound
    public AudioClip introTTS;                      //se reproduce antes de empezar el juego, nada más cargar la escena

    ScreenInput screenInput;

    private void OnValidate()
    {
        //control de valores de vibración válidos
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
        //control de valores de radios válidos (mayores o iguales a 0)
        for(int i = 0; i< radios.Count; i++)
        {
            if (radios[i].cerca < 0)
                radios[i].setCerca(0);
            if (radios[i].medio < 0)
                radios[i].setMedio(0);
            if (radios[i].lejos < 0)
                radios[i].setLejos(0);
        }

        //control de solución válida (valor dentro del rango de la lista)
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
        //reproducimos el audio inicial
        src.clip = introTTS;
        src.Play();
        screenInput.deactivate(introTTS.length);    //desactivamos el input mientras dure el audio
    }

    void Update()
    {
        //control de diferentes inputs
        //Estructurado de esta manera en lugar de llamar a ProcessMouse directamente con ScreenInput.instance.getInput() porque
        //  lo primero que hace el método es calcular el centro más cercano, algo que no hace falta hacer en varios tipos de move
        if (ScreenInput.instance.getInput() == move.pressing)
        {
            ProcessMouse(move.pressing);
            click = true;       //auxiliar para ver la posición del ratón en onGizmosDraw
        }
        else
        {
            Vibration.Cancel();
            tapSound.Stop();
            click = false;
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
        //activación de eventos en función del input y la distancia
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

    //calcula la vibración correspondiente dada la distancia dist al centro con indice cIndex dentro de la lista de centros
    void CalculateVibration(int cIndex, float dist)
    {
        //distancia al radio céntrico
        if (dist <= radios[cIndex].cerca)
        {
            //solo realizamos las acciones si es la primera vez que entramos al centro
            if (lastZone != SonarZones.cerca)
            {
                lastZone = SonarZones.cerca;
                Vibration.Cancel();     //cancelación preventiva de la vibración actual
                Vibration.SonarVibration(vibrationStrengh, 2000, vibrationRestCerca, true);
            }
        }
        //rango del segundo radio
        else if (dist <= (radios[cIndex].medio + radios[cIndex].cerca))
        {
            if (lastZone != SonarZones.medio)
            {
                lastZone = SonarZones.medio;
                Vibration.Cancel();
                Vibration.SonarVibration(vibrationStrengh, vibrationDuration, vibrationRestMedio, true);
            }
        }
        //rango del tercer radio
        else if (dist <= (radios[cIndex].lejos + radios[cIndex].medio + radios[cIndex].cerca))
        {
            if (lastZone != SonarZones.lejos)
            {
                lastZone = SonarZones.lejos;
                Vibration.Cancel();
                Vibration.SonarVibration(vibrationStrengh, vibrationDuration, vibrationRestLejos, true);
            }
        }
        //fuera del rango de los radios
        else
        {
            if (lastZone != SonarZones.fuera)
            {
                lastZone = SonarZones.fuera;
                Vibration.Cancel();
            }
        }
    }

    //procesa un click tomando como centro más cercano cIndex
    void ProcessClick(int cIndex, float dist)
    {
        if (dist <= radios[cIndex].cerca)
        {
            tapSoundStopTime(radios[cIndex].clickSound.length);     //paramos el sonido tapSound mientras dure el evento actual
            src.PlayOneShot(radios[cIndex].clickSound);
        }
    }

    //procesa un doble click tomando como centro más cercano cIndex, y actúa en consecuencia
    void ProcessDoubleClick(int cIndex, float dist)
    {
        //si el centro más cercano cumple la condición de distancia
        if(dist <= radios[cIndex].cerca) {
            //es la solución
            if (cIndex == solutionIndex)
            {
                //desactivamos elementos activos
                src.Stop();
                tapSound.Stop();
                tapPlay = false;
                //reproducimos el audio de victoria
                src.PlayOneShot(winSound);
                screenInput.deactivate(winSound.length);
                //llamada al método que gestiona los eventos de victoria, cuando termine de reproducirse el audio actual
                Invoke("onVictory", winSound.length);
            }
            //condición de fallo
            else
            {
                //desactivamos elementos activos
                tapSound.Stop();
                tapPlay = false;
                src.Stop();
                src.PlayOneShot(looseSound);
                //eliminamos del juego el punto clickado
                ChangeRadius(cIndex, 0, 0, 0);
            }
        }
    }

    //método simple que reproduce el TTS antes de invocar a los eventos de victoria
    void onVictory()
    {
        src.PlayOneShot(winTTS);
        Invoke("onVictoryEvents", winTTS.length);
    }

    //método que gestiona los eventos que ocurren tras la victoria
    void onVictoryEvents()
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

    //bloquea que se reproduzca el sonido tapSound durante un tiempo time
    private void tapSoundStopTime(float time)
    {
        tapSound.Stop();
        tapPlay = false;
        Invoke("tapSoundReady", time);
    }

    //método auxiliar del superior para dejar de bloquar el sonido tapSound
    private void tapSoundReady()
    {
        tapPlay = true;
    }

    //para ver los radios desde el editor
    private void OnDrawGizmos()
    {
        for (int i = 0; i < centros.Count; i++)
        {
            Gizmos.DrawWireSphere(centros[i].position, radios[i].cerca);
            Gizmos.DrawWireSphere(centros[i].position, radios[i].cerca + radios[i].medio);
            Gizmos.DrawWireSphere(centros[i].position, radios[i].cerca + radios[i].medio + radios[i].lejos);
        }

        if (click)
            Gizmos.DrawWireSphere(Camera.main.ScreenToWorldPoint(Input.mousePosition), 0.2f);
    }

    //cambia los radios del centro index dentro de la lista de radios según los parámetros recibidos
    private void ChangeRadius(int index, float nCerca, float nMedio, float nLejos)
    {
        SonarRadios auxRad = new SonarRadios();
        auxRad.setCerca(nCerca);
        auxRad.setMedio(nMedio);
        auxRad.setLejos(nLejos);
        radios[index] = auxRad;
    }
}
