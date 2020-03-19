using System.Collections;
using System.Collections.Generic;
using UnityEngine;

//------------------------------------
//              AVISO
//    ESTE SCRIPT NO SE USA, SE HA
//  VISTO REEMPLAZADO POR EL MANAGER
//       SonarPuzzleManager.cs
//------------------------------------

public class SonarItem : MonoBehaviour
{
    public SonarRadios sr;

    private bool click = false;

    SonarZones lastZone = SonarZones.fuera; //por defecto empezamos fuera

    public void OnValidate()
    {
        //comprobación de valores válidos
        if (sr.cerca < 0)
            sr.cerca = 0;
        if (sr.medio < 0)
            sr.medio = 0;
        if (sr.lejos < 0)
            sr.lejos = 0;
    }

    // Start is called before the first frame update
    void Start()
    {
        
    }

    private void OnDrawGizmos()
    {
        Gizmos.DrawWireSphere(transform.position, sr.cerca);
        Gizmos.DrawWireSphere(transform.position, sr.cerca + sr.medio);
        Gizmos.DrawWireSphere(transform.position, sr. cerca + sr.medio + sr.lejos);

        if (click)
        {
            Gizmos.DrawWireSphere(Camera.main.ScreenToWorldPoint(Input.mousePosition), 0.2f);
            //print("debug de raton");
        }
    }

    // Update is called once per frame
    void Update()
    {
        click = Input.GetMouseButton(0);
        if (click)
        {
            checkClickPos();
        }
        else Vibration.Cancel();
    }

    void checkClickPos()
    {
        Vector2 auxPos = Camera.main.ScreenToWorldPoint(Input.mousePosition);
        float distance = Vector2.Distance(transform.position, auxPos);
        if (distance <= sr.cerca)
        {
            if (lastZone != SonarZones.cerca)
            {
                print("cerca");
                lastZone = SonarZones.cerca;
                Vibration.Cancel();
                Vibration.SonarVibration(0.5f, 333, 50, true);
            }
        }
        else if(distance <= sr.medio + sr.cerca)
        {
            if (lastZone != SonarZones.medio)
            {
                print("medio");
                lastZone = SonarZones.medio;
                Vibration.Cancel();
                Vibration.SonarVibration(0.5f, 333, 333, true);
            }
        }
        else if(distance <= sr.lejos + sr.medio + sr.cerca)
        {
            if (lastZone != SonarZones.lejos)
            {
                print("lejos");
                lastZone = SonarZones.lejos;
                Vibration.Cancel();
                Vibration.SonarVibration(0.5f, 333, 666, true);
            }
        }
        else
        {
            if (lastZone != SonarZones.fuera)
            {
                lastZone = SonarZones.fuera;
                Vibration.Cancel();
            }
        }
    }
}


