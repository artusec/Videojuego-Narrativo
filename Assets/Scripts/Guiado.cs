using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public enum direccion {up, right, down, left}
public class Guiado : MonoBehaviour
{
    public direccion direction;
    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
    }
    private void OnTriggerStay2D(Collider2D collision)
    {
        if (collision.transform.tag == "Player")
        {
            print(direction);
        }
    }
}
