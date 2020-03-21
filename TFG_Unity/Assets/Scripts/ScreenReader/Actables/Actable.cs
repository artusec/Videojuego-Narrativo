using System.Collections;
using System.Collections.Generic;
using UnityEngine;

// Base class for actable screen reader elements

public class Actable : MonoBehaviour
{

    public virtual void Act() { }

	[HideInInspector]
    public SRElement element;

    public void RemoveFromList()
    {
        SRManager.instance.currentList.Remove(gameObject.GetComponent<SRElement>());
    }
}
