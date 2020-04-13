using System.Collections;
using System.Collections.Generic;
using UnityEngine;

// Abandonas una escena cuando tienes el objeto, no vuelves atras
public class LockedSceneChange : Actable
{
    AudioSource src;
    public string keyRequired;
    public string sceneToLoad;
    public AudioClip failAudio;
    public AudioClip successAudio;
    public AudioClip doorOpen;
    public bool destroyKeyOnUse = false;

    public override void Act()
    {
        if (element.getState() == objectState.DEFAULT)
        {
            SRManager srm = SRManager.instance;
            SRElement e = srm.inventory.SearchObjectByName(keyRequired);
            if (e != null)
            {
                if (destroyKeyOnUse) e.actBehaviour.RemoveFromList();
                element.setState(objectState.USED);
                GameManager.instance.SaveData();
                srm.playTTS(doorOpen);
                srm.deactivate(doorOpen.length);
                //cargar nueva escena (con invoke, para que de tiempo a oir el texto)
                Invoke("change", doorOpen.length);
            }
            else
            {
                srm.playTTS(failAudio);
            }
        }
    }

    void change()
    {
        GameManager.instance.changeScene(sceneToLoad);
    }
}
