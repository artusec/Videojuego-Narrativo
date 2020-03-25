using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SRElement : MonoBehaviour
{
    public AudioClip audioLabel;
    public string label;
    public Actable actBehaviour;
    [HideInInspector]
    public SRList parentList;
    objectState state = objectState.DEFAULT;

    // Start is called before the first frame update
    void Start()
    {
        if (actBehaviour != null)
        {
            SetElementToActable();
        }
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    public void setState(objectState stat)
    {
        state = stat;
    }
    public objectState getState()
    {
        return state;
    }

    public void SetElementToActable()
    {
        actBehaviour.element = this;
    }

    public void ReadLabel()
    {
        if (audioLabel != null)
        {
            TTS.instance.PlayClip(audioLabel);
        }

        else
        {
            //TTS.instance.PlayTTS(label);
            SRManager.instance.playTTS(audioLabel);
            Debug.Log("tts label: " + label);
        }
    }

    public void ElementAct()
    {
        if (actBehaviour != null)
        {
            actBehaviour.Act();
        }
        else Debug.Log(label + " is useless");
    }
}
