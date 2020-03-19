using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SRListChanger : Actable
{
    public SRList list;

    public override void Act()
    {
        SRManager.instance.SetList(list);
    }
}
