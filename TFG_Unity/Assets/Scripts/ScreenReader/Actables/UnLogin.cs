using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class UnLogin : Actable
{
    // Start is called before the first frame update
    public override void Act()
    {
        TextToSpeech.Speak("Cuenta cerrada");
        GameManager.instance.saveUsername("");
    }
}
