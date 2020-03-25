using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SRList : MonoBehaviour
{

    public List<SRElement> sreList;
    public SRList prevList;
    public int currentFocus;

    void Start()
    {
        SetListToChildren();
    }
    public void setObjects()
    {

    }

    private void SetListToChildren()
    {
        foreach (SRElement e in sreList)
        {
            e.parentList = this;
        }
    }

    public bool ContainsObjectByName(string name)
    {
        bool found = false;
        foreach(SRElement se in sreList)
        {
            if (se.name == name) { found = true; break; }
        }
        return found;
    }

    public SRElement SearchObjectByName(string name)
    {
        SRElement element = null;
        foreach (SRElement se in sreList)
        {
            if (se.name == name) { element = se; break; }
        }
        return element;
    }

    public void SetList(List<SRElement> list)
    {
        sreList = list;
        SetListToChildren();
        GoToBeginning();
    }

    public SRElement GetCurrentFocus()
    {
        return sreList[currentFocus];
    }

    public void ActOnFocus()
    {
        sreList[currentFocus].ElementAct();
    }

    public void ReadFocus()
    {
        if (sreList.Count == 0) Debug.Log("Lista vacia");
        else sreList[currentFocus].ReadLabel();
    }

    public void Remove(int index)
    {
        sreList.RemoveAt(index);
        if (index <= currentFocus) GoTo(currentFocus - 1);
        else ReadFocus();
    }

    public void Remove(SRElement element)
    {
        int index = sreList.IndexOf(element);
        sreList.Remove(element);
        if (index < currentFocus || (index == currentFocus && index == sreList.Count))
            GoTo(currentFocus - 1);
        else ReadFocus();
    }


    public void Insert(int index, SRElement element)
    {
        sreList.Insert(index, element);
        if (index <= currentFocus) GoTo(currentFocus + 1);
        else ReadFocus();
    }

    public void Push(SRElement element)
    {
        Insert(sreList.Count, element);
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
        SRManager.instance.SetList(prevList);
    }

    private void GoTo(int index)
    {
        if (sreList.Count > 0)
        {
            currentFocus = index;
            // no out of bounds
            if (currentFocus < 0) currentFocus = 0;
            else if (currentFocus >= sreList.Count) currentFocus = sreList.Count - 1;
            sreList[currentFocus].ReadLabel();
        }
    }
}
