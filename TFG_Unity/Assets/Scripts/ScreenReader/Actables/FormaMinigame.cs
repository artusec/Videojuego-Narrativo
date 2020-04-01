using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class FormaMinigame : Actable
{
    public string name = "Circle";

    public FormasManager frm = null;

    public override void Act()
    {
        frm.ReceiveChoice(name);
    }
}
