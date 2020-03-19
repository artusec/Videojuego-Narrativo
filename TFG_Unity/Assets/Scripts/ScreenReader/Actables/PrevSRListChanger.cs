using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PrevSRListChanger : Actable
{

    public override void Act()
    {
        SRManager.instance.GoToPreviousList();
    }
}