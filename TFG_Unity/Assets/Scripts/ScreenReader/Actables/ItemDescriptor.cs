using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ItemDescriptor : Actable
{
    public AudioClip descriptionClip = null;
    public bool oneUse = false;
    public AudioClip usedDescriptionClip = null;

    public override void Act()
    {
        if (element.state == objectState.DEFAULT)
        {
            if (descriptionClip != null) SRManager.instance.playTTS(descriptionClip);
            if (oneUse) element.state = objectState.USED;
        }
        else if (element.state == objectState.USED)
        {
            if (usedDescriptionClip != null) SRManager.instance.playTTS(usedDescriptionClip);
        }
    }
}