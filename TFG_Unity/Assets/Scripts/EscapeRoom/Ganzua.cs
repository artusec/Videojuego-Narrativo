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

    bool canClick = true;

    private string sceneToLoad = "DemoEnd";

    // Start is called before the first frame update
    void Start()
    {
        ganzObj = transform.GetChild(0).gameObject;
        src = GetComponent<AudioSource>();
        randUnlockPosition();
        SRManager.instance.playTTS(infoClip);
    }


    void randUnlockPosition()
    {
        unlockPosition = Random.Range(rangeUnlock*2, 360-rangeUnlock*2);
    }
    // Update is called once per frame
    void Update()
    {
        if(Input.GetMouseButtonDown(0))
        {
            initPos = Camera.main.ScreenToWorldPoint(Input.mousePosition);
            ganzObj.transform.parent = null;
            transform.right = initPos;
            ganzObj.transform.parent = transform;
        }
        if (Input.GetMouseButton(0))
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
        if(Input.GetMouseButtonUp(0))
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
        Invoke("soundFound", 2);
    }
    void soundFound()
    {
        SRManager.instance.playTTS(endClip);
        Invoke("onOpen", 3);
    }
    void onOpen()
    {
        int progress = GameManager.instance.room;
        switch (progress)
        {
            case 1:
                GameManager.instance.addItemToInv("LlaveOxidada1");
                GameManager.instance.setScenState("CajaCandado1", 2);
                GameManager.instance.saveToTXT();
                sceneToLoad = "Room1";
                Invoke("change", 1);
                break;
            default:
                sceneToLoad = "End";
                Invoke("change", 1);
                break;

        }
    }
    void change()
    {
        GameManager.instance.changeScene(sceneToLoad, false);
    }
}
