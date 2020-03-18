using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class ActivateButton : Actable
{
    public Button button;

    public override void Act()
    {
        button.onClick.Invoke();
    }
}
