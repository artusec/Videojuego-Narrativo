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

        if (inventory == null)
        {
           inventory = SRManager.instance.currentList;
        }
        inventory.Insert(inventory.sreList.Count, Instantiate(item, 
           inventory.transform).GetComponent<SRElement>());

        TTS.instance.PlayTTS("Obtienes " + item.name);

        Invoke("SelfDestruct", 2);

    }

    private void SelfDestruct()
    {
        //RemoveFromList();
        //Destroy(gameObject);
    }


}
