using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Lock : Actable
{
    public SRList inventory;

    public override void Act()
    {
        bool found = false;
        foreach(SRElement e in inventory.sreList)
        {
            if (e.textLabel == "Ganzua") found = true;
        }
        Debug.Log(found ? "Abriendo puerta con ganzua, paso a juego ganzua" : "No se puede abrir candado");
    }
}
