using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Duck : Actable
{
    public AudioClip quack;

    public override void Act()
    {
        TTS.instance.PlayClip(quack);
    }

}
