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
        changeToPoint(0);
    }

    public void Loose()
    {
        src.Stop();
        looseAudio.Play();
        Invoke("ResetScene", 2.5f);
    }

    //comprueba si una posicion dada pos está dentro del radio de acción elegido del audioSource
    public bool checkPos(Vector3 pos)
    {
        return Vector2.Distance(pos, src.transform.position) <= actionRadius;
    }

    private void ResetScene()
    {
        SceneManager.LoadScene("PruebaLaberinto");
    }

    public void NextPoint()
    {
        changeToPoint(actIndex + 1);
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
        foreach(LaberynthPoints lp in path)
        {
            Gizmos.DrawWireSphere(lp.pos.position, 0.2f);
        }
    }
}