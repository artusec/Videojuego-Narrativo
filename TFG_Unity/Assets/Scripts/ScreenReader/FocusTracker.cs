using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class FocusTracker : MonoBehaviour
{

    private SRManager srm;

    // Start is called before the first frame update
    void Start()
    {
        srm = GameObject.FindGameObjectWithTag("SRManager").GetComponent<SRManager>();
    }

    // Update is called once per frame
    void Update()
    {
        Vector3 pos = srm.currentList.GetCurrentFocus().gameObject.transform.position;
        pos.z = 2;
        gameObject.transform.position = pos;
    }
}
