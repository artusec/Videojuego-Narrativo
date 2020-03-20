using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Lock : Actable
{
    public SRList inventory;
    public string keyRequired;
    public string sceneToLoad;
    public string failString;
    public string successString;
    public string usedString;

    public override void Act()
    {
        if (GetComponent<SRElement>().getState() != 1)
        {
            bool found = false;
            foreach (SRElement e in inventory.sreList)
            {
                if (e.activeLabel == keyRequired)
                {
                    found = true;
                    e.setState(2);
                }
            }
            if (found)
            {
                GetComponent<SRElement>().setState(1);
                TTS.instance.PlayTTS(successString);
                //cargar nueva escena (con invoke, para que de tiempo a oir el texto)
                Invoke("change", 1);
            }
            else TTS.instance.PlayTTS(failString);
        }
        else TTS.instance.PlayTTS(usedString);
    }

    void change()
    {
        GameManager.instance.saveState(inventory, GameObject.Find("EscenaElements").GetComponent<SRList>());
        GameManager.instance.levelPassed = 2;
        GameManager.instance.changeScene(sceneToLoad);
    }
}
