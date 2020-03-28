using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class ActivateInputField : Actable
{
    public InputField inputField;

    public override void Act()
    {
        inputField.Select();
    }
}
