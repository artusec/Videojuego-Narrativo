using System.Collections;
using System.Collections.Generic;
using UnityEngine;

using UnityEngine.UI;

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

[System.Serializable]
public struct FormasSelectionOptions
{
    public Forma solution;
    public Forma[] formas;
}

public class FormasManager : MonoBehaviour
{
    public AudioClip introTTS;
    public AudioClip success;
    public AudioClip wrong;
    public AudioClip ttsFin;

    //para manejar el flujo del minijuego
    public int level = 0;
    private bool selectionPhase = false;

    [Tooltip("Los diferentes GOs que serán utilizados como formas a reconocer")]
    [SerializeField]
    public List<GameObject> formas;

    [Tooltip("Las distintas opciones de seleccion para cada GO en la lista de formas")]
    [SerializeField]
    public List<FormasSelectionOptions> textos;

    [Tooltip("El menú de selección, para activarlo o desactivarlo según corresponda ")]
    public GameObject selectionContainer;

    [Space(10)]

    public AudioClip[] formAudios = new AudioClip[(int)Forma.Retroceder];

    public ScreenInput input = null;

    private SRManager srm = null;

    private void OnValidate()
    {
        //controla que el array de textos de selección siempre tenga el mismo tamaño que el array de formas a reconocer (no se puede reiniciar 
        //  el array de textos al tamaño del array de formas directamente porque desde editor se pierden los textos escritos previamente)
        if (textos.Count != formas.Count) {
            print("El tamaño del array de textos de seleccion es distinto al del array de formas. Ajustando el tamaño" +
                "para que sea igual al array de formas");
            if (textos.Count < formas.Count)
            {
                for (int i = 0; i < formas.Count - textos.Count; i++)
                    textos.Add(new FormasSelectionOptions());
            }
            else
            {
                for (int i = 0; i < textos.Count - formas.Count; i++)
                    textos.RemoveAt(textos.Count - 1);
            }
        }
        //controla que la variable level no sobrepase el limite del array de formas
        if (level < 0)
            level = 0;
        else if (level > formas.Count - 1)
            level = formas.Count - 1;
    }

    void Start()
    {
        //activamos la primera forma a reconocer
        // reproducir u naudio con el texto TTS.instance.PlayTTS("Trata de reconocer las formas con la vibracion, despues abre la selección con doble tap y seleccionala.");
        srm = SRManager.instance;
        setLevel(level);

        srm.playTTS(introTTS);
        ScreenInput.instance.deactivate(introTTS.length);
    }

    void Update()
    {
        // con doble click activamos la seleccion de forma
        if (srm.type == SRType.NoInput)
        {
            if (input.getInput() == move.doubleClick && !selectionPhase)
            {
                print("pasando a fase de seleccion");
                // el invoke es necesario para que no se detecte pulsacion en el mismo frame
                Invoke("goToSelection", 0.1f);
            }
        }
    }

    private void goToSelection() {
        srm.type = SRType.Default;
        formas[level].SetActive(false);
        srm.currentList.currentFocus = 0;
        srm.currentList.GoToBeginning();
        selectionPhase = true;
    }

    private void goToRecognition()
    {
        //srm.type = SRType.NoInput;
        //formas[level].SetActive(true);
        selectionPhase = false;
    }

    public void setLevel(int nLevel)
    {
        if (level < 0 || level >= formas.Count)
            throw new System.Exception("Se ha intentado acceder a un índice erróneo en el array de formas");
    
        for (int i = 0; i < formas.Count; i++)
            formas[i].SetActive(false);
        formas[nLevel].SetActive(true);

        setUpForms();
    }

    public void addLevel(int nLevel)
    {
        //válido para nLevel negativo y seguro para no pasarse del límite del array
        level = (level + nLevel) % formas.Count;
        setLevel(level);
        ReturnToSelection();
    }

    private void setUpForms()
    {
        List<SRElement> list = SRManager.instance.currentList.sreList;
        Forma f;
        for(int i = 0; i < textos.Count; i++)
        {
            f = textos[level].formas[i];

            list[i].label = f.ToString();
            list[i].audioLabel = formAudios[(int)f];
            ((FormaMinigame)list[i].actBehaviour).form = f;
        }
    }

    public void ReceiveChoice(Forma s)
    {
        //caso de acierto con la forma solución
        if (s == textos[level].solution)
        {
            SRManager.instance.playTTS(success);
            //Audio TTS.instance.PlayTTS("Acierto");
            //condición de victoria del puzle
            if (level == textos.Count - 1)
            {
                print("victoria");
                SRManager.instance.playTTS(ttsFin);
                ScreenInput.instance.deactivate(ttsFin.length);
                Invoke("OnVictory", ttsFin.length);
            }
            addLevel(1);
        }
        //caso de fallo de selección
        else
        {
            SRManager.instance.playTTS(wrong);
           // Audio TTS.instance.PlayTTS("Fallo");
            print("fallo de selección");
        }
    }

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

    public void ReturnToSelection()
    {
        // reproducir audio TTS.instance.PlayTTS("Volviendo a la fase de reconocimiento");
        srm.type = SRType.NoInput;
        formas[level].SetActive(true);
        //necesario para que no vuelva a contar el doble click para otra razon en el mismo frame
        Invoke("goToRecognition", 0.1f);
    }
}
