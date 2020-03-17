using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Spam : Actable
{
    public GameObject prefab;
    public int position = 0;

    public override void Act()
    {

        SRManager srm = GameObject.FindGameObjectWithTag("SRManager").GetComponent<SRManager>();
        srm.currentList.Insert(position, Instantiate(prefab, this.transform.parent).GetComponent<SRElement>());
    }
}
