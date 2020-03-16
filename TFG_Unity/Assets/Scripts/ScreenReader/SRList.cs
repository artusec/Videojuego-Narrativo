using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SRList : MonoBehaviour
{

    public List<SRElement> sreList;
    public SRList prevList;
    public int currentFocus;

    public void ActOnFocus()
    {
        sreList[currentFocus].ElementAct();
    }

    public void ReadFocus()
    {
        sreList[currentFocus].ReadLabel();
    }

    public void Remove(int index)
    {
        sreList.RemoveAt(index);
        if (index <= currentFocus) GoTo(currentFocus - 1);
    }

    public void Advance()
    {
        GoTo(currentFocus + 1);
    }

    public void Back()
    {
        GoTo(currentFocus - 1);
    }

    public void GoToBeginning()
    {
        GoTo(0);
    }

    public void GoToEnd()
    {
        GoTo(sreList.Count-1);
    }

    public void GoToPreviousList()
    {
        SRManager srm = GameObject.FindGameObjectWithTag("SRManager").GetComponent<SRManager>();
        srm.SetList(prevList);
    }

    private void GoTo(int index)
    {
        currentFocus = index;
        // no out of bounds
        if (currentFocus < 0) currentFocus = 0;
        else if (currentFocus >= sreList.Count) currentFocus = sreList.Count-1;
        sreList[currentFocus].ReadLabel();
    }
}
