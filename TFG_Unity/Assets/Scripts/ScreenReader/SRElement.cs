using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SRElement : MonoBehaviour
{
    public AudioClip audioLabel;
    public AudioClip audioUsedLabel;
    public string activeLabel;
    public string usedLabel;
    public Actable actBehaviour;
    public SRList parentList;
    int state = 0;

    // Start is called before the first frame update
    void Start()
    {
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    public void setState(int stat)
    {
        state = stat;
    }
    public int getState()
    {
        return state;
    }

    public void ReadLabel()
    {
        if (state == 0)
        {
            if (audioLabel != null)
            {
                TTS.instance.PlayClip(audioLabel);
            }

            else
            {
                TTS.instance.PlayTTS(activeLabel);
                Debug.Log("tts label: " + activeLabel);
            }
        }
        else
        {
            if (audioUsedLabel != null)
            {
                TTS.instance.PlayClip(audioUsedLabel);
            }

            else
            {
                TTS.instance.PlayTTS(usedLabel);
                Debug.Log("tts label: " + usedLabel);
            }
        }
    }

    public void ElementAct()
    {
        if (actBehaviour != null)
        {
            actBehaviour.Act();
        }
        else Debug.Log(activeLabel + " is useless");
    }
}
