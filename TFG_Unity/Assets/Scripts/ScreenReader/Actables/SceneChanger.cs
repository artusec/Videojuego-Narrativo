using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SceneChanger : Actable
{
    public string sceneToLoad;
    public AudioClip changeClip;

    public override void Act()
    {
        if (element.getState() == objectState.DEFAULT)
        {
            element.setState(objectState.USED);
            SRManager.instance.playTTS(changeClip);

            //cargar nueva escena (con invoke, para que de tiempo a oir el texto)
            Invoke("change", 1);
        }
    }

    void change()
    {
        //GameManager.instance.saveState(inventory, GameObject.Find("EscenaElements").GetComponent<SRList>());
        GameManager.instance.changeScene(sceneToLoad);
    }
}
