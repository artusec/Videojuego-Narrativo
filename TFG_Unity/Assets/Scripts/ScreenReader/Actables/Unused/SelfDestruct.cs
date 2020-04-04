using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SelfDestruct : Actable
{

    public override void Act()
    {
        RemoveFromList();
        Destroy(this.gameObject);
    }
}
