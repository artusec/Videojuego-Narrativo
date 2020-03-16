using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SRListChanger : MonoBehaviour
{
    public SRList list;

    public void Act()
    {
        SRManager srm = GameObject.FindGameObjectWithTag("SRManager").GetComponent<SRManager>();
        srm.SetList(list);
    }
}
