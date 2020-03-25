using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class LockedSceneChange : Actable
{
    public string keyRequired;
    public string sceneToLoad;
    public string failString;
    public string successString;

    public override void Act()
    {
        if (element.getState() == objectState.DEFAULT)
        {
            if (SRManager.instance.inventory.ContainsObjectByName(keyRequired)){
                element.setState(objectState.USED);
                Debug.Log(successString);
                //cargar nueva escena (con invoke, para que de tiempo a oir el texto)
                Invoke("change", 1);
            }
            else Debug.Log(failString);
        }
    }

    void change()
    {
        //GameManager.instance.saveState(inventory, GameObject.Find("EscenaElements").GetComponent<SRList>());
        GameManager.instance.changeScene(sceneToLoad);
    }
}
