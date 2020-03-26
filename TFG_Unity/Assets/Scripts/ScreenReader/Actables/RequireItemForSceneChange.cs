using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RequireItemForSceneChange : Actable
{
    public string itemRequired;
    public string sceneToLoad;
    public string failString;
    public string successString;
    public string usedString;

    public override void Act()
    {
        objectState state = element.getState();
        if (state == objectState.DEFAULT)
        {
            if (SRManager.instance.inventory.ContainsObjectByName(itemRequired))
            {
                //element.setState(objectState.USED);
                Debug.Log(successString);
                //cargar nueva escena (con invoke, para que de tiempo a oir el texto)
                Invoke("change", 1);
            }
            else Debug.Log(failString);
        }
        else if(state == objectState.USED)
        {
            Debug.Log(usedString);
        }
    }

    void change()
    {
        GameManager.instance.saveToTXT();
        GameManager.instance.changeScene(sceneToLoad, false);
    }
}
