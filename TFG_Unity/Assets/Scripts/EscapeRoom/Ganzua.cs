using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Ganzua : MonoBehaviour
{
    GameObject ganzObj;
    Vector2 initPos;
    Vector2 actualPos;
    public float rangeUnlock = 5;
    public float unlockPosition = 180;


    AudioSource src;
    public AudioClip infoClip;
    public AudioClip endClip;
    public AudioClip clip;
    public AudioClip clipFound;
    public AudioClip openSound;
    public AudioClip closeSound;
    float lastAngle = 0;
    public float angleSeparation = 10;

    ScreenInput screenInput = null;
    move mov;

    bool canClick = true;

    private string sceneToLoad = "DemoEnd";

    // Start is called before the first frame update
    void Start()
    {
        ganzObj = transform.GetChild(0).gameObject;
        src = GetComponent<AudioSource>();
        randUnlockPosition();
        SRManager.instance.playTTS(infoClip);
        screenInput = ScreenInput.instance;
        screenInput.deactivate(infoClip.length);
    }


    void randUnlockPosition()
    {
        unlockPosition = Random.Range(rangeUnlock*2, 360-rangeUnlock*2);
    }
    // Update is called once per frame
    void Update()
    {
        mov = screenInput.getInput();
        if(mov == move.pressed)
        {
            initPos = Camera.main.ScreenToWorldPoint(Input.mousePosition);
            ganzObj.transform.parent = null;
            transform.right = initPos;
            ganzObj.transform.parent = transform;
        }
        if (mov == move.pressing || mov == move.help)
        {
            actualPos = Camera.main.ScreenToWorldPoint(Input.mousePosition);
            transform.right = actualPos;
            if (ganzObj.transform.eulerAngles.z > lastAngle + angleSeparation)
            {
                lastAngle = ganzObj.transform.eulerAngles.z;
                if (!(ganzObj.transform.eulerAngles.z < unlockPosition + rangeUnlock &&
                  ganzObj.transform.eulerAngles.z > unlockPosition - rangeUnlock))
                {
                    src.PlayOneShot(clip);
                    canClick = true;
                }
            }
            else if (ganzObj.transform.eulerAngles.z < lastAngle - angleSeparation)
            {
                lastAngle = ganzObj.transform.eulerAngles.z;
                if (!(ganzObj.transform.eulerAngles.z < unlockPosition + rangeUnlock &&
                  ganzObj.transform.eulerAngles.z > unlockPosition - rangeUnlock))
                {
                    src.PlayOneShot(clip);
                    canClick = true;
                }
            }
            if (canClick && ganzObj.transform.eulerAngles.z < unlockPosition + rangeUnlock &&
                  ganzObj.transform.eulerAngles.z > unlockPosition - rangeUnlock)
            {
                src.PlayOneShot(clipFound);
                canClick = false;
            }
        }
        if(screenInput.released(mov))
        {
            if (!canClick)
            {
                open();
            }
            else
            {
                src.PlayOneShot(closeSound);
            }
        }
    }

    void open()
    {
        print("abierto");
        src.volume = 0.5f;
        src.PlayOneShot(openSound);
        screenInput.deactivate(openSound.length);
        Invoke("soundFound", openSound.length);
    }
    void soundFound()
    {
        SRManager.instance.playTTS(endClip);
        screenInput.deactivate(endClip.length);
        Invoke("onOpen", endClip.length);
    }
    void onOpen()
    {
        int progress = GameManager.instance.room;
        switch (progress)
        {
            case 1:
                GameManager.instance.addItemToInv("LlaveOxidada1");
                GameManager.instance.setScenState("CajaCandado1", 2);
                GameManager.instance.removeItemFromInv("Ganzua1");
                GameManager.instance.SaveData();
                sceneToLoad = "Room1";
                screenInput.deactivate(1);
                Invoke("change", 1);
                break;
            default:
                sceneToLoad = "Chase";
                screenInput.deactivate(1);
                Invoke("change", 1);
                break;

        }
    }
    void change()
    {
        GameManager.instance.changeScene(sceneToLoad);
    }
}
