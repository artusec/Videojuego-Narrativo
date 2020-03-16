using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SRManager : MonoBehaviour
{
    public SRList currentList;
    public ScreenInput sInput;
    private move gesture;

    // Start is called before the first frame update
    void Start()
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
        currentList = srl;
        currentList.ReadFocus();
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
                currentList.ReadFocus();
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
