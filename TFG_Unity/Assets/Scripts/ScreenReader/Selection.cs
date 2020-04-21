using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Selection : MonoBehaviour
{
    SRManager sr;
    public GameObject selection;
    // Start is called before the first frame update
    void Start()
    {
        sr = SRManager.instance;
    }

    // Update is called once per frame
    void Update()
    {
        selection.transform.position = sr.currentList.GetCurrentFocus().transform.position;
    }
}
