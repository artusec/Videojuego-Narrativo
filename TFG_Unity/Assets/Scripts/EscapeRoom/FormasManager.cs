using System.Collections;
using System.Collections.Generic;
using UnityEngine;

using UnityEngine.UI;

//enumerado con las diseños de posibles formas a elegir en la fase de selección
//  no tienen por qué existir la formas física como GO para añadir 
//  una forma nueva, salvo que vaya a ser la solución de un nivel
[System.Serializable]
public enum Forma {
    Cuadrado,
    Círculo,
    Triángulo,
    Estrella,
    Pentágono,
    Rombo,
    Retroceder
}

//struct que maneja la fase de selección de un nivel minijuego como tal
[System.Serializable]
public struct FormasSelectionOptions
{
    public Forma solution;  //la solución al nivel
    public Forma[] formas;  //lista de las posibles formas a elegir, un elemento debe ser igual que solution para poder ser pasable

}

//clase principal del minijuego que manaje el flujo general. En caso de extender el minijuego y que haya otros componentes
//  que necesiten acceder a éste, se podría hacer de esta clase un singleton de manera similar a cómo están hechos otros minijuegos
public class FormasManager : MonoBehaviour
{
    public int level = 0;    //para manejar el flujo de nivel del minijuego, se mueve en rango [0, formas.Count-1]
    private bool selectionPhase = false;    //bandera auxiliar para manejar las dos fases dentro de un nivel

    [Tooltip("Los diferentes GOs que serán utilizados como formas a reconocer")]
    [SerializeField]
    public List<GameObject> formas;

    [Tooltip("Las distintas opciones de seleccion para cada GO en la lista de formas")]
    [SerializeField]
    public List<FormasSelectionOptions> optionList;

    [Space(10)]

    //audios del juego
    public AudioClip introTTS;  //suena nada más comienza la escena
    public AudioClip success;   //suena al elegir la forma correcta
    public AudioClip wrong;     //suena al equivocarse en la selección
    public AudioClip ttsFin;    //suena al terminar el minijuego

    public AudioClip[] nextFormClips;

    [Tooltip("Los labels de las distintas formas dentro del enum Forma")]
    public AudioClip[] formAudios = new AudioClip[(int)Forma.Retroceder];

    public ScreenInput input = null;
    private SRManager srm = null;   //se registra en el start sólo al ser estático

    private void OnValidate()
    {
        //se controla que la lista de opciones no tenga ni más ni menos elementos que el número de formas físicas en la lista de formas
        if (optionList.Count != formas.Count) {
            print("El tamaño del array de textos de seleccion es distinto al del array de formas. Ajustando el tamaño" +
                "para que sea igual al array de formas");
            if (optionList.Count < formas.Count)
            {
                for (int i = 0; i < formas.Count - optionList.Count; i++)
                    optionList.Add(new FormasSelectionOptions());
            }
            else
            {
                for (int i = 0; i < optionList.Count - formas.Count; i++)
                    optionList.RemoveAt(optionList.Count - 1);
            }
        }
        //se controla que la variable level no sobrepase el limite del array de formas al iniciar al juego
        if (level < 0)
            level = 0;
        else if (level > formas.Count - 1)
            level = formas.Count - 1;
    }

    void Start()
    {
        srm = SRManager.instance;
        srm.playTTS(introTTS);
        //se desactiva el input del usuario mientras dure el sonido inicial
        ScreenInput.instance.deactivate(introTTS.length);
        //esperamos a que termine el audio para arrancar la lógica del juego
        Invoke("startGame", introTTS.length);  
    }

    public void startGame()
    {
        setLevel(1); //activamos la primera forma a reconocer
    }

    void Update()
    {
        //si se está en fase de reconocimiento (srm esta en modo NoInput para no tener en cuenta los swipes en esta fase)
        if (srm.type == SRType.NoInput)
        {
            // con doble click se activa la fase de seleccion
            if (input.getInput() == move.doubleClick && !selectionPhase)
            {
                // el invoke es necesario para que no se detecte la doble pulsacion en el mismo frame
                ScreenInput.instance.deactivate(0.1f);
                Invoke("goToSelection", 0.1f);
            }
        }
    }

    private void goToSelection() {
        Vibration.Cancel();     //se cancelan las vibraciones activas por si acaso
        formas[level].SetActive(false); //forma desactivada para que no siga activando vibraciones indeseadas
        selectionPhase = true;  //marcaje de bandera
        //ajustes del srm
        srm.type = SRType.Default;  //se cambia el modo de srm para que ahora sí reconozca los swipes
        srm.currentList.currentFocus = 0;
        srm.currentList.GoToBeginning();
    }

    public void setLevel(int nLevel)
    {
        if (level < 0 || level >= formas.Count)
            throw new System.Exception("Se ha intentado acceder a un índice erróneo en el array de formas");
        //desactivamos todas las formas y luego activamos la correspondiente
        for (int i = 0; i < formas.Count; i++)
            formas[i].SetActive(false);
        formas[nLevel].SetActive(true);
        setUpForms();   //ajuste de información de la lista del srm
        StartCoroutine("sayPossibleOptions");
    }

    void auxAddLevel()
    {
        addLevel(1);
    }

    public void addLevel(int nLevel)
    {
        //válido para nLevel negativo y seguro para no pasarse del límite del array
        level = (level + nLevel) % formas.Count;
        setLevel(level);
        //StartCoroutine("sayPossibleOptions");
        //ReturnToRecognition();
    }

    //método que ajusta la lista del srm para que tenga la información del nivel actual
    private void setUpForms()
    {
        List<SRElement> list = SRManager.instance.currentList.sreList;
        Forma f;
        for(int i = 0; i < optionList.Count; i++)
        {
            f = optionList[level].formas[i];

            list[i].label = f.ToString();
            list[i].audioLabel = formAudios[(int)f];
            ((FormaMinigame)list[i].actBehaviour).form = f;
        }
    }

    //metodo que indica por audio las posibles opciones al comenzar cada nivel
    //  también activa automáticamente la fase de reconocimiento
    public IEnumerator sayPossibleOptions()
    {
        int i = 0;
        while (i < SRManager.instance.currentList.sreList.Count - 1)
        {
            srm.playTTS(SRManager.instance.currentList.sreList[i].audioLabel);
            i++;
            yield return new WaitForSeconds(SRManager.instance.currentList.sreList[i].audioLabel.length + 0.25f);
        }
        ReturnToRecognition();
    }

    //método que recibe la forma seleccionada, determina si es la correcta, y actúa en consecuencia
    public void ReceiveChoice(Forma f)
    {
        //caso de acierto con la forma solución
        if (f == optionList[level].solution)
        {
            SRManager.instance.playTTS(success);
            if (level == optionList.Count - 1)  //condición de victoria del puzle
            {
                SRManager.instance.playTTS(ttsFin);
                ScreenInput.instance.deactivate(ttsFin.length); //no se tiene en cuenta el input mientras dure el audio final
                Invoke("OnVictory", ttsFin.length); //se espera a que termine de reproducirse el audio para avanzar a la siguiente escena
            }
            else
            {
                //Pasa a estado FORMA
                srm.playTTS(nextFormClips[level]);
                ScreenInput.instance.deactivate(nextFormClips[level].length);
                Invoke("auxAddLevel", nextFormClips[level].length);    //si no se ha acabado el minijuego, pasamos al siguiente nivel
            }
        }
        //caso de fallo de selección
        else
        {
            SRManager.instance.playTTS(wrong);
        }
    }

    //método de manejo de eventos al terminar el minijuego
    private void OnVictory()
    {
        int progress = GameManager.instance.room;
        switch (progress)
        {
            case 2:
                GameManager.instance.addItemToInv("Pomo2");
                GameManager.instance.setScenState("Cajon2", 2);
                GameManager.instance.saveToTXT();
                GameManager.instance.changeScene("Room2");
                break;
            default:
                break;
        }
    }

    public void ReturnToRecognition()
    {
        srm.type = SRType.NoInput;  //se vuelve a cambiar el modo para ajustarlo a la fase de reconocimiento
        formas[level].SetActive(true);  
        Invoke("goToRecognition", 0.1f);    //necesario para que no vuelva a contar el doble click para otra razon en el mismo frame
    }

    private void goToRecognition()
    {
        selectionPhase = false;
    }
}
