using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

[System.Serializable]
public struct LaberynthPoints
{
    public Transform pos;
    public AudioClip audio;
    [Tooltip("true si hay que girar hacia la izquierda, false hacia la derecha")]
    public bool solutionLeft;
}

public class LaberynthManager : MonoBehaviour
{
    public static LaberynthManager instance;

    [Tooltip("El AudioSource que se irá moviendo por el mapa")]
    public AudioSource src;
    [Tooltip("El audio que se reproducirá en caso de derrota")]
    public AudioSource looseAudio;
    [Tooltip("Radio de acción dentro del cual se permite al player girar")]
    public float actionRadius = 2;

    [SerializeField]
    public List<LaberynthPoints> path;
    //auxiliar para llevar el manejo de dónde nos encontramos actualmente
    private int actIndex = 0;

    private void Awake()
    {
        instance = this;
    }

    private void Start()
    {
        actIndex = 0;
        src.transform.position = path[actIndex].pos.position;
        src.clip = path[actIndex].audio;
        src.loop = true;
    }

    //comprueba si una posicion dada pos está dentro del radio de acción elegido del audioSource
    public bool checkPos(Vector3 pos)
    {
        return Vector2.Distance(pos, src.transform.position) <= actionRadius;
    }

    //mira si se ha tomado el giro en la dirección correcta y hace los cambios necesarios
    //  bool left indica el giro tomado, true si es hacia la izquierda y false hacia la derecha
    public void ProcessTurn(bool left, Transform playerTransform)
    {
        //si coincide con la solución
        if(left == path[actIndex].solutionLeft)
        {
            print("giro adecuado");
            //paramos el audio
            src.Stop();
            //ajustamos el player
            playerTransform.position = path[actIndex].pos.position;
            //y aumentamos el indice
            changeToPoint(actIndex + 1);
        }
        else
        {
            src.Stop();
            print("derrota por camino equivocado, se reiniciará la escena en 2 segundos");
            looseAudio.Play();
            Invoke("ResetScene", 2);
        }
    }

    private void ResetScene()
    {
        SceneManager.LoadScene("Laberinto");
    }

    //cambia el audioSource para que se ajuste al punto con índice index dentro de la lista
    public void changeToPoint(int index)
    {
        if (index >= path.Count)
            print("has ganado");
        else
        {
            actIndex = index;
            src.transform.position = path[index].pos.position;
            src.clip = path[index].audio;
            src.loop = true;
            src.Play();
        }
    }

    private void OnDrawGizmos()
    {
        if(src != null)
            Gizmos.DrawWireSphere(src.transform.position, actionRadius);
    }
}