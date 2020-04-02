using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class FormaMinigame : Actable
{
    public Forma form = Forma.Cuadrado;

    public FormasManager frm = null;

    public override void Act()
    {
        if (form == Forma.Retroceder) frm.ReturnToSelection();
        else frm.ReceiveChoice(form);
    }
}
