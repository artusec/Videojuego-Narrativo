using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class FillWithSTT : Actable
{
    public Text target = null;

    public override void Act()
    {
        STT.instance.Listen(target);
    }
}
