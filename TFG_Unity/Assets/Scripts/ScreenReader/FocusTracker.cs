using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class FocusTracker : MonoBehaviour
{


    // Start is called before the first frame update
    void Start()
    {
    }

    // Update is called once per frame
    void Update()
    {
        Vector3 pos = SRManager.instance.currentList.GetCurrentFocus().gameObject.transform.position;
        pos.z = 2;
        gameObject.transform.position = pos;
    }
}
