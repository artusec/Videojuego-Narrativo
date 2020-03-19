using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Lock : Actable
{
    public SRList inventory;
    public string keyRequired;
    public int sceneToLoad = 0;
    public string failString;
    public string successString;

    public override void Act()
    {
        bool found = false;
        foreach(SRElement e in inventory.sreList)
        {
            if (e.textLabel == keyRequired) found = true;
        }
        if (found)
        {
            TTS.instance.PlayTTS(successString);
            //cargar nueva escena (con invoke, para que de tiempo a oir el texto)
        }
        else TTS.instance.PlayTTS(failString);
    }
}
