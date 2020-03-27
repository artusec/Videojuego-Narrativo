using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class AppCloser : Actable
{

    public override void Act()
    {
        Application.Quit();
    }

}
