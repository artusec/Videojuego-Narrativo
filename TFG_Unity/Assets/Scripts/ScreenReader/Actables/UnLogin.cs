using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class UnLogin : Actable
{
    public AudioClip clip;
    // Start is called before the first frame update
    public override void Act()
    {
        if(clip != null)
            SRManager.instance.playTTS(clip);
        GameManager.instance.resetLocalData();
    }
}
