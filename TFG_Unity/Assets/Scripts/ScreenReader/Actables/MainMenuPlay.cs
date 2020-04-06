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
        if (onlinePlay && gm.getUser() != "")
        {
            gm.SetUpPlay();
        }
        else if (onlinePlay) gm.changeScene("Online");
        else gm.SetUpPlay();
    }
}
