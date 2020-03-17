using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SelfDestruct : Actable
{

    public override void Act()
    {
        SRManager srm = GameObject.FindGameObjectWithTag("SRManager").GetComponent<SRManager>();
        srm.currentList.Remove(gameObject.GetComponent<SRElement>());
        Destroy(this.gameObject);
    }
}
