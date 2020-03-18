using System.Collections;
using System.Collections.Generic;
using UnityEngine;

using UnityEngine.UI;

public class AddItemToInventory : Actable
{
    public SRList inventory;
    public GameObject item;


    public override void Act()
    {
        SRManager srm = GameObject.FindGameObjectWithTag("SRManager").GetComponent<SRManager>();

        if (inventory == null)
        {
           inventory = srm.currentList;
        }
        inventory.Insert(inventory.sreList.Count, Instantiate(item, 
           inventory.transform).GetComponent<SRElement>());

        RemoveFromList();
        Destroy(gameObject);
    }


}
