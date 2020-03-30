using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class LockedSceneChange : Actable
{
    AudioSource src;
    public string keyRequired;
    public string sceneToLoad;
    public AudioClip failAudio;
    public AudioClip successAudio;
    public AudioClip doorOpen;

    public override void Act()
    {
        if (element.getState() == objectState.DEFAULT)
        {
            if (SRManager.instance.inventory.ContainsObjectByName(keyRequired))
            {
                element.setState(objectState.USED);
                SRManager.instance.playTTS(doorOpen);
                //CAMBIAR
                GameManager.instance.room++;
                //cargar nueva escena (con invoke, para que de tiempo a oir el texto)
                Invoke("change", 4.5f);
            }
            else
            {
                SRManager.instance.playTTS(failAudio);
            }
        }
    }

    void change()
    {
        //GameManager.instance.saveState(inventory, GameObject.Find("EscenaElements").GetComponent<SRList>());
        GameManager.instance.changeScene(sceneToLoad);
    }
}
