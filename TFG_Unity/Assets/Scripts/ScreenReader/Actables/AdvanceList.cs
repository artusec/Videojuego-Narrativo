using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class AdvanceList : Actable
{
    public override void Act()
    {
        element.parentList.Advance();
    }
}
