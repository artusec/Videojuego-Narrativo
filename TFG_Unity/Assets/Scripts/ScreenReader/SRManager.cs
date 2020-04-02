using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public enum SRType { Default, Room, NoInput};

public class SRManager : MonoBehaviour
{


    public AudioSource ttsSource;
    public AudioClip[] intro;
    public SRType type = SRType.Default;

    public int roomIndex = -1;
    public SRList currentList;
    public bool readOnStart = false;
    private SRList prevList;
    private move gesture;

    ScreenInput screenInput = null;

    public SRList inventory;
    public SRList scene;

    // Instancia de la clase (patron singleton)
    public static SRManager instance;


    // Gestion del singleton, y se comprueba que tenga audiosource
    void Awake()
    {
            instance = this;
    }

    // Start is called before the first frame update
    void Start()
    {
        screenInput = ScreenInput.instance;
        if (type == SRType.Room)
        {
            if (GameManager.instance.isSceneNew(roomIndex))
            {
                GameManager.instance.loadRoomFromFile(roomIndex);
                if (intro != null && intro.Length != 0)
                {
                    playTTS(intro[0]);
                    deactivate(intro[0].length);
                    Invoke("readFocus", intro[0].length);
                }
                else readFocus();
            }
            else
            {
                currentList.ReadFocus();
                if (false) //MIRA SI HAY DATOS EN LA NUBE
                {
                    print("Datos en la nube");
                }
                else //MIRA DATOS LOCALES
                {
                    print("Datos locales");
                    GameManager.instance.loadLocalData();
                }
            }
            GameManager.instance.instantiateRoom();
        }
    }
    private void readFocus()
    {
        if (readOnStart) currentList.ReadFocus();
    }
    private void OnEnable()
    {
      //  currentList.ReadFocus();
    }

    // Update is called once per frame
    void Update()
    {
        if(type != SRType.NoInput)
            ProcessGesture(screenInput.getInput());
    }

    public void deactivate(float time)
    {
        type = SRType.NoInput;
        Invoke("activate", time);
    }
    public void activate()
    {
        type = SRType.Room;
    }
    //Reproduce un audio "clip" en el canal de "TTS"
    public void playTTS(AudioClip clip)
    {
        ttsSource.clip = clip;
        ttsSource.Play();
    }
    public void SetList(SRList srl)
    {
        prevList = currentList;
        currentList = srl;
        currentList.ReadFocus();
    }

    public void GoToPreviousList()
    {
        if (prevList != null) SetList(prevList);
        else Debug.Log("There is no previous list yet.");
    }


    void ProcessGesture(move m)
    {
        switch (type)
        {
            case SRType.Default:
                DefaultGestures(m);
                break;
            case SRType.Room:
                RoomGestures(m);
                break;
            default: break;
        }
    }

    void RoomGestures(move m)
    {
        switch (m)
        {
            case move.nullMov:
                break;
            case move.left:
                currentList.Back();
                break;
            case move.right:
                currentList.Advance();
                break;
            case move.click:
                //  currentList.ReadFocus();
                break;
            case move.doubleClick:
                currentList.ActOnFocus();
                break;
            case move.down:
                currentList.GoToPreviousList();
                break;
            default: break;
        }
    }

    void DefaultGestures(move m)
    {
        switch (m)
        {
            case move.left:
                currentList.Back();
                break;
            case move.right:
                currentList.Advance();
                break;
            case move.doubleClick:
                currentList.ActOnFocus();
                break;
            default: break;
        }
    }
}
