using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SRListChanger : Actable
{
    public SRList list;

    public override void Act()
    {
        SRManager srm = GameObject.FindGameObjectWithTag("SRManager").GetComponent<SRManager>();
        srm.SetList(list);
    }
}
