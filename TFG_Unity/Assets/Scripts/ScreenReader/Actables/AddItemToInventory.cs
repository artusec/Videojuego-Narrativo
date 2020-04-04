using System.Collections;
using System.Collections.Generic;
using UnityEngine;

using UnityEngine.UI;

public class AddItemToInventory : Actable
{
    public string item;
    public AudioClip pickUpLine;
    public AudioClip emptyLine;

    public override void Act()
    {
        objectState state = element.getState();
        if (state == objectState.DEFAULT)
        {
            GameManager.instance.addItemToInv(item);
            SRManager.instance.playTTS(pickUpLine);
            element.setState(objectState.USED);
            GameManager.instance.SaveData();
        }
        else if (state == objectState.USED)
        {
            SRManager.instance.playTTS(emptyLine);
        }

    }



}
