using System.Collections;
using System.Collections.Generic;
using UnityEngine;

using UnityEngine.UI;

public class AddItemToInventory : Actable
{
    public string item;
    public string pickUpLine;
    public string emptyLine;

    public override void Act()
    {
        objectState state = element.getState();
        if (state == objectState.DEFAULT)
        {
            GameManager.instance.addItemToInv(item);
            Debug.Log(pickUpLine);
            element.setState(objectState.USED);
        }
        else if (state == objectState.USED)
        {
            Debug.Log(emptyLine);
        }

    }



}
