using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class LaberynthController : MonoBehaviour
{
    public float vel = 1;

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

    private void LateUpdate()
    {
        Camera.main.transform.position = new Vector3(transform.position.x, transform.position.y, Camera.main.transform.position.z);
    }

    //en este minijuego solo recogemos clicks que pueden estar en la parte izquierda o derecha de la pantalla
    void ProcessInput()
    {
        //si estamos en opción de girar
        if (LaberynthManager.instance.checkPos(transform.position))
        {
            Vector2 pos = Input.mousePosition;
            //giro hacia la izquierda 
            if(pos.x <= Screen.width / 2)
            {
                print("giro izq");
                //giramos 90 grados 
                transform.eulerAngles += Vector3.forward * 90;
                //llamada a procesar el giro
                LaberynthManager.instance.ProcessTurn(true, this.transform);
            }
            //giro hacia la derecha
            else
            {
                print("giro der");
                //giramos -90 grados
                transform.eulerAngles -= Vector3.forward * 90;
                //llamada a procesar el giro
                LaberynthManager.instance.ProcessTurn(false, this.transform);
            }
        }
        //derrota por girar antes / después de tiempo
        else
        {
            print("intentaste girar antes de tiempo, espera a estar a rango adecuado");
        }
    }
}
