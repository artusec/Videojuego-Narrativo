using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SRManager : MonoBehaviour
{
    public SRList currentList;
    private SRList prevList;
    public ScreenInput sInput;
    private move gesture;

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
    }

    private void OnEnable()
    {
        currentList.ReadFocus();
    }

    // Update is called once per frame
    void Update()
    {
        ProcessGesture(sInput.getInput());
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
        switch (m) {
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
}
