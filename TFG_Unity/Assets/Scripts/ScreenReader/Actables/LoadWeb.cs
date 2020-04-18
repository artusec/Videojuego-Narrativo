using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class LoadWeb : Actable
{
    public string url = "http://laslomasiii.serveftp.net:4398/inicio.php";
    public AudioClip avisoCarga;


    public override void Act()
    {
        if (element.getState() == objectState.DEFAULT)
        {
            SRManager.instance.playTTS(avisoCarga);
            SRManager.instance.deactivate(avisoCarga.length);
            Invoke("openWeb", avisoCarga.length);
        }
    }

    void openWeb()
    {
        Application.OpenURL(url);
    }

}
