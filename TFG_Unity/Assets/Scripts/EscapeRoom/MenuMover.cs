using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class MenuMover : MonoBehaviour
{
    [Tooltip("Los puntos por los que se desplazará el menú visualmente")]
    [SerializeField]
    private List<Transform> interestPoints;

    //auxiliares para movimiento de camara

    //Objetivo de movimiento de la cámara dentro de la lista de puntos (índice)
    private int targetPoint = 0;
    private int lastPoint = 0;
    float lengthToStart = 0;
    float startTime = 0;
    [Tooltip("velocidad a la que se desplaza la cámara entre elementos")]
    [SerializeField]
    private float speed = 1.0f;

    private SRManager srm;

    private void OnValidate()
    {
        //nos aseguramos que el punto inicial esta dentro del rango permitido
        if (targetPoint < 0)
            targetPoint = 0;
        else if (targetPoint >= interestPoints.Count - 1)
            targetPoint = interestPoints.Count - 1;
    }

    //ayuda para ubicar la camara correctamente
    private Vector3 getCameraTargetPos(Vector3 target)
    {
        return  target + (Vector3.back * 10);
    }

    void Start()
    {
        //ajustamos la referencia al sr
        srm = SRManager.instance;

        //comenzamos con el índice puesto directamente, sin desplazamientos
        Camera.main.transform.position = interestPoints[targetPoint].position;

        //marcamos desde donde comenzara el movimiento
        lastPoint = targetPoint;
    }

    void Update()
    {
        //comprobación de activar movimiento
        if(srm.currentList.currentFocus != targetPoint)
        {
            targetPoint = srm.currentList.currentFocus;
            //distancia total a recorrer
            lengthToStart = Vector3.Distance(interestPoints[targetPoint].transform.position, interestPoints[lastPoint].transform.position);
        }
        //condición de movimiento
        if(Camera.main.transform.position != getCameraTargetPos(interestPoints[targetPoint].transform.position))
        {
            float distCovered = (Time.time - startTime) * speed;
            float fracMovement = (lengthToStart == 0) ? 0 : distCovered / lengthToStart;
            Camera.main.transform.position = Vector3.Lerp(getCameraTargetPos(interestPoints[lastPoint].transform.position), 
                                                          getCameraTargetPos(interestPoints[targetPoint].transform.position),
                                                          fracMovement);
        }
        //condición de parar movimiento
        else
        {
            if (lastPoint != targetPoint)
                lastPoint = targetPoint;
            startTime = Time.time;
        }
    }
}
