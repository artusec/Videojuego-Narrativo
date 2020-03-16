using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SRElement : MonoBehaviour
{
    public AudioClip audioLabel;
    public string textLabel;
    public Component actBehaviour;

    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    public void ReadLabel()
    {
        if (audioLabel != null)
        {
            Debug.Log("Audio label");
        }

        else Debug.Log("tts label: " + textLabel);
    }

    public void ElementAct()
    {
        if (actBehaviour != null)
        {
            Debug.Log(textLabel + " does something");
            actBehaviour.SendMessage("Act");
        }
        else Debug.Log(textLabel + " is useless");
    }
}
