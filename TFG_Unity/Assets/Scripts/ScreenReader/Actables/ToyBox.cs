using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ToyBox : Actable
{
    public string item1 = "Peluche3";
    public string item2 = "JuegoSimon3";
    public AudioClip pickUpLine1;
    public AudioClip pickUpLine2;
    public AudioClip emptyLine;

    public override void Act()
    {
        objectState state = element.getState();
        switch (state)
        {
            case objectState.DEFAULT:
                GameManager.instance.addItemToInv(item1);
                SRManager.instance.playTTS(pickUpLine1);
                element.setState(objectState.USED);
                GameManager.instance.SaveData();
                break;
            case objectState.USED:
                GameManager.instance.addItemToInv(item2);
                SRManager.instance.playTTS(pickUpLine2);
                element.setState(objectState.USED2);
                GameManager.instance.SaveData();
                break;
            case objectState.USED2:
                SRManager.instance.playTTS(emptyLine);
                break;
            default: break;
        }
    }
}
