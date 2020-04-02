using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class MinijuegoForma : MonoBehaviour
{
    //auxiliar para manejar que no se repitan llamadas a la vibracion
    private bool lastCliked = false;

    private void OnMouseOver()
    {
        print("encima");
        if (ScreenInput.instance.getInput() == move.pressing)
        {
            if (!lastCliked)
            {
                lastCliked = true;
                Vibration.SonarVibration(1, 1, 0, true);
                //llamada a vibrar al maximo
                print("clickado");
            }
        }
        else
        {
            lastCliked = false;
            Vibration.Cancel();
        }
    }

    private void OnMouseExit()
    {
        lastCliked = false;
        Vibration.Cancel();
    }
}
