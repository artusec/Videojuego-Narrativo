using System.Collections;
using System.Collections.Generic;
using UnityEngine;

// Abandonas la escena si tienes le objeto, pero mas tarde vuelves
public class RequireItemForSceneChange : Actable
{
    public string itemRequired;
    public string sceneToLoad;
    public AudioClip failString;
    public AudioClip successString;
    public AudioClip effect;
    public AudioClip usedString;
    private SRManager srm;

    public void Start()
    {
        srm = SRManager.instance;
    }

    public override void Act()
    {
        objectState state = element.getState();
        if (state == objectState.DEFAULT)
        {
            if (srm.inventory.ContainsObjectByName(itemRequired))
            {
                srm.playTTS(successString);
                srm.deactivate(successString.length);
                //cargar nueva escena (con invoke, para que de tiempo a oir el texto)
                Invoke("effectSound", successString.length);
            }
            else
            {
                srm.playTTS(failString);
            }
        }
        else if(state == objectState.USED)
        {
            srm.playTTS(usedString);
        }
    }
    void effectSound()
    {
        if (effect != null)
        {
            srm.playTTS(effect);
            srm.deactivate(effect.length);
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
