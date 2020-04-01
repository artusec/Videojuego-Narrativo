using System.Collections;
using System.Collections.Generic;
using UnityEngine;

using UnityEngine.UI;

public enum SelectionOptions
{
    Left,
    Middle,
    Right,
    TurnBack
}

[System.Serializable]
public struct FormasSelectionOptions
{
    public string solution;
    public string text1,
        text2,
        text3;
}

public class FormasManager : MonoBehaviour
{
    //para manejar el flujo del minijuego
    public int level = 0;
    private SelectionOptions select;
    private bool selection = false;

    [Tooltip("Los diferentes GOs que serán utilizados como formas a reconocer")]
    [SerializeField]
    public List<GameObject> formas;

    [Tooltip("Las distintas opciones de seleccion para cada GO en la lista de formas")]
    [SerializeField]
    public List<FormasSelectionOptions> textos;

    [Tooltip("El menú de selección, para activarlo o desactivarlo según corresponda ")]
    public GameObject selectionContainer;

    public Text option1Text,
        option2Text,
        option3Text;

    [Space(10)]

    public SRElement sre1, sre2, sre3;

    public SRManager srm = null;
    public ScreenInput input = null;

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
        TTS.instance.PlayTTS("Trata de reconocer las formas con la vibracion, despues abre la selección con doble tap y seleccionala.");
        setLevel(level);
    }

    void Update()
    {
        // con doble click activamos la seleccion de forma
        if (input.getInput() == move.doubleClick)
        {
            if (!srm.enabled)
            {
                srm.enabled = true;
            }
            else
            {
                srm.enabled = false;
            }
            if (!selection)
            {
                selection = true;
                print("pasando a fase de seleccion");
                formas[level].SetActive(false);
            }
            else
            {
                //seleccion de la forma actual
                OptionSelected(select);
            }
            //srm.enabled = !srm.enabled;
        }
        else
        {
            if (srm.enabled && input.getInput() == move.down)
                srm.enabled = false;
        }
        if(selection)
        {
            int aux = (int)select;
            if (ScreenInput.instance.getInput() == move.left)
            {
                aux += 1;
                if (aux >= System.Enum.GetValues(typeof(SelectionOptions)).Length)
                    aux = 0;
                //select = (SelectionOptions)(((int)select - 1) % System.Enum.GetValues(typeof(SelectionOptions)).Length);
                print("girado a la izquierda, " + select.ToString());
            }
            else if (ScreenInput.instance.getInput() == move.right)
            {
                aux -= 1;
                if (aux < 0)
                    aux = System.Enum.GetValues(typeof(SelectionOptions)).Length - 1;
                //select = (SelectionOptions)(((int)select + 1) % System.Enum.GetValues(typeof(SelectionOptions)).Length);
                print("girado a la derecha, " + select.ToString());
            }
            select = (SelectionOptions)aux;
        }
        //manejo de cambio de estado entre reconocimiento y seleccion
    }

    public void setLevel(int nLevel)
    {
        if (level < 0 || level >= formas.Count)
            throw new System.Exception("Se ha intentado acceder a un índice erróneo en el array de formas");
    
        for (int i = 0; i < formas.Count; i++)
            formas[i].SetActive(false);
        formas[nLevel].SetActive(true);

        option1Text.text = sre1.label = textos[level].text1;
        option2Text.text = sre2.label = textos[level].text2;
        option3Text.text = sre3.label = textos[level].text3;
    }

    public void addLevel(int nLevel)
    {
        //válido para nLevel negativo y seguro para no pasarse del límite del array
        level = (level + nLevel) % formas.Count;
        setLevel(level);
    }

    public void OptionSelected(SelectionOptions index)
    {
        string aux;
        switch (index)
        {
            case SelectionOptions.Left:
                aux = textos[level].text1;
                break;
            case SelectionOptions.Middle:
                aux = textos[level].text2;
                break;
            case SelectionOptions.Right:
                aux = textos[level].text3;
                break;
            case SelectionOptions.TurnBack:
                print("volviendo atras");
                srm.enabled = false;
                aux = "tb";
                break;
            default:
                aux = "";
                break;
        }
        //caso de acierto con la forma solución
        if (aux == textos[level].solution)
        {
            TTS.instance.PlayTTS("Acierto");
            //condición de victoria del puzle
            if(level == textos.Count - 1)
            {
                print("victoria");
            }
            addLevel(1);
        }
        //caso de fallo de selección
        else if(aux != "tb"){
            TTS.instance.PlayTTS("Fallo");
            print("fallo de selección");
        }
        else
        {
            TTS.instance.PlayTTS("Volviendo a la fase de reconocimiento");
            selection = true;
            formas[level].SetActive(true);
        }
    }
}
