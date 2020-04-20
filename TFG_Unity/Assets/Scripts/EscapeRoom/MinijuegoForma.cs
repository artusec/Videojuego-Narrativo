using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class MinijuegoForma : MonoBehaviour
{
    //auxiliar bandera
    private bool lastCliked = false;

    private void OnMouseOver()
    {
        //si pulsamos sobre la forma
        if (ScreenInput.instance.getInput() == move.pressing)
        {
            //usamos una bandera para no repetir llamadas a comenzar la vibración
            if (!lastCliked)
            {
                //llamada a vibrar al maximo
                Vibration.SonarVibration(1, 2000, 0, true);
                OnVibrationStart();
            }
        }
        else
        {
            //si dejamos de pulsar, reajustamos la bandera y cancelamos la vibración
            lastCliked = false;
            Vibration.Cancel();
        }
    }

    //metodo auxiliar para eventos que empiezan cuando comienza a vibrar la forma (reproducción de un sonido, por ejemplo)
    private void OnVibrationStart()
    {
        //ajuste de bandera
        lastCliked = true;

        //manejo de eventos
        //-----------------
    }

    private void OnMouseExit()
    {
        //si nos salimos de la forma, podemos resetear la vibración y la bandera
        lastCliked = false;
        Vibration.Cancel();
    }
}
