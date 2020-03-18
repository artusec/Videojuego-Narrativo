using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PrevSRListChanger : Actable
{

    public override void Act()
    {
        SRManager srm = GameObject.FindGameObjectWithTag("SRManager").GetComponent<SRManager>();
        srm.GoToPreviousList();
    }
}