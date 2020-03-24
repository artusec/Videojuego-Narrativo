using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class LaberynthController : MonoBehaviour
{
    public float vel = 1;
    public float visionLenght = 1;
    private AudioSource feet;

    private void Start()
    {
        feet = GetComponentInChildren<AudioSource>();
    }

    // Update is called once per frame
    void Update()
    {
        //recogida de input
        if (ScreenInput.instance.getInput() == move.click)
        {
            print("click");
            ProcessInput();
        }
        transform.Translate(Vector2.up * vel * Time.deltaTime);
    }

    private void FixedUpdate()
    {
        //lanzamos un raycast y miramos si hemos chocado con un muro
        RaycastHit2D hit = Physics2D.Raycast(transform.position, Vector2.up, visionLenght);
        if (hit.collider != null && hit.collider.CompareTag("LabPoint"))
        {
            print("cuidado");
        }
        Debug.DrawLine(transform.position, new Vector2(transform.position.x, transform.position.y) + Vector2.up * visionLenght) ;
    }

    private void LateUpdate()
    {
        Camera.main.transform.position = new Vector3(transform.position.x, transform.position.y, Camera.main.transform.position.z);
    }

    //en este minijuego solo recogemos clicks que pueden estar en la parte izquierda o derecha de la pantalla
    void ProcessInput()
    {
        Vector2 pos = Input.mousePosition;
        //giro hacia la izquierda 
        if(pos.x <= Screen.width / 2)
        {
            print("giro izq");
            //giramos 90 grados 
            transform.eulerAngles += Vector3.forward * 90;
        }
        //giro hacia la derecha
        else
        {
            print("giro der");
            //giramos -90 grados
            transform.eulerAngles -= Vector3.forward * 90;
        }
    }

    private void OnTriggerEnter(Collider coll)
    {
        if (coll.gameObject.tag == "LabWall" && tag != "LabForesight")
        {
            feet.Stop();
            LaberynthManager.instance.Loose();
        }
        else if(coll.gameObject.tag == "LabPoint" && tag != "LabForesight")
        {
            LaberynthManager.instance.NextPoint();
        }
    }
}
