using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class test : MonoBehaviour {

    TextToSpeech tts;
    void Start()
    {
        tts = GetComponent<TextToSpeech>();
    }
    public void Speak()
    {
        Debug.Log("Reporduciendo...");
        InputField Input = GameObject.Find("InputField").GetComponent<InputField>();
        Debug.Log(Input.text);
        tts.Speak(Input.text);
    }
    public void ChangeSpeed(string vel)
    {
        Debug.Log(vel);
        tts.changeSpeed(vel);
    }
    public void ChangeLanguage(string s)
    {
        Debug.Log(s);
        tts.changeLang(s);
    }
 
}
