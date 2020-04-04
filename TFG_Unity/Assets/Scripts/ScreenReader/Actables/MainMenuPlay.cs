using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class MainMenuPlay : Actable
{
    public bool onlinePlay = false;

    public override void Act()
    {
        GameManager gm = GameManager.instance;
        gm.onlinePlay = onlinePlay;
        gm.loadRoomNumber();
        gm.SetUpPlay();
    }
}
