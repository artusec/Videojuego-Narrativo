using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class MinijuegoForma : MonoBehaviour
{
    private void OnMouseOver()
    {
        print("encima");
        if (Input.GetMouseButton(0))
        {
            Vibration.SonarVibration(1, 1, 5, true);
            //llamada a vibrar al maximo
            print("clickado");
        }
        else Vibration.Cancel();
    }

    private void OnMouseExit()
    {
        Vibration.Cancel();
    }
}
