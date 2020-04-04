using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RequireItemForSceneChange : Actable
{
    public string itemRequired;
    public string sceneToLoad;
    public AudioClip failString;
    public AudioClip successString;
    public AudioClip effect;
    public AudioClip usedString;

    public override void Act()
    {
        objectState state = element.getState();
        if (state == objectState.DEFAULT)
        {
            if (SRManager.instance.inventory.ContainsObjectByName(itemRequired))
            {
                //element.setState(objectState.USED);
                SRManager.instance.playTTS(successString);
                SRManager.instance.deactivate(successString.length);
                //cargar nueva escena (con invoke, para que de tiempo a oir el texto)
                Invoke("effectSound", successString.length);
            }
            else
            {
                SRManager.instance.playTTS(failString);
            }
        }
        else if(state == objectState.USED)
        {
            SRManager.instance.playTTS(usedString);
        }
    }
    void effectSound()
    {
        if (effect != null)
        {
            SRManager.instance.playTTS(effect);
            SRManager.instance.deactivate(effect.length);
            Invoke("change", effect.length);
        }
        else change();
    }
    void change()
    {
        GameManager.instance.SaveData();
        GameManager.instance.changeScene(sceneToLoad);
    }
}
