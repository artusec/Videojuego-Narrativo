using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public enum SRType { Default, Room, NoInput};

public class SRManager : MonoBehaviour
{


    public AudioSource ttsSource;
    public AudioClip intro;
    public SRType type = SRType.Default;

    public AudioClip inventoryClip;
    public AudioClip sceneClip;

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

    private GameManager gm;

    // Gestion del singleton, y se comprueba que tenga audiosource
    void Awake()
    {
            instance = this;
    }

    // Start is called before the first frame update
    void Start()
    {
        gm = GameManager.instance;
        screenInput = ScreenInput.instance;
        if (type == SRType.Room)
        {
            if (gm.isSceneNew(roomIndex))
            {
                gm.loadRoomFromFile(roomIndex);
                gm.instantiateRoom();
                gm.SaveData();
                if (intro != null && intro.length != 0)
                {
                    playTTS(intro);
                    deactivate(intro.length);
                    Invoke("introReadFocus", intro.length);
                }
                else introReadFocus();
            }
            else
            {
                if (gm.onlinePlay) //MIRA SI HAY DATOS EN LA NUBE
                {
                    print("Datos online");
                    gm.loadFromWeb();
                }
                else //MIRA DATOS LOCALES
                {
                    print("Datos locales");
                    gm.loadLocalData();
                }
                gm.instantiateRoom();
                currentList.ReadFocus();
            }
            // Nos aseguramos de la asignación de los objetos
            // ya que Unity no garantiza el orden de los Starts
            inventory.SetListToChildren();
            scene.SetListToChildren();
        }
        else introReadFocus();
    }

    private void introReadFocus()
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

                changeList();
                break;
            case move.up:
                changeList();
                break;
            default: break;
        }
    }

    void changeList()
    {
        if (currentList == scene)
        {
            playTTS(inventoryClip);
            screenInput.deactivate(inventoryClip.length);
            Invoke("callCurrentList", inventoryClip.length);
        }
        else if (currentList == inventory)
        {
            playTTS(sceneClip);
            screenInput.deactivate(sceneClip.length);
            Invoke("callCurrentList", sceneClip.length);
        }
    }
    void callCurrentList()
    {
        currentList.GoToPreviousList();
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
