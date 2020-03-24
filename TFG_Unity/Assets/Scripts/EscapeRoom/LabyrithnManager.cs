using System.Collections;
using System.Collections.Generic;
using UnityEngine;

[System.Serializable]
public struct LabyrinthEvento
{
    [Tooltip("El trigger que activa el evento de reproducción de audio")]
    public Collider2D trigger;
    [Tooltip("El audio que se reproducirá cuando el player entre en el trigger")]
    public AudioClip audio;
    [Tooltip("Indica si el sonido se reproducirá desde la izquierda o desde la derecha")]
    public bool leftSound;
}

public class LabyrithnManager : MonoBehaviour
{
    public static LabyrithnManager instance;

    [Tooltip("El AudioSource desde el cual se reproducirán los sonidos de los eventos")]
    public AudioSource src;

    [Tooltip("Cada evento de la persecución")]
    [SerializeField]
    public List<LabyrinthEvento> events;

    [Tooltip("El container con los triggers")]
    public GameObject EventContainer;
    [Tooltip("La velocidad a la que se moverán los triggers, de la cual depende la dificultad del juego")]
    public float vel = 1;

    [Header("Los dos puntos desde los que se reproducirá el audio")]
    public Transform leftPoint;
    public Transform rightPoint;

    [Space(10)]

    [Tooltip("número de choques permitidos")]
    public int lifes = 3;
    //indice auxiliar
    private int lastCollider;
    //indica si el player actúa de manera correcta durante el evento
    private bool playerCorrect;

    private void Awake()
    {
        instance = this;
    }

    // Update is called once per frame
    void Update()
    {
        EventContainer.transform.Translate(Vector3.down * Time.deltaTime * vel);
    }

    //comprueba si el movimiento introducido del player durante el trigger es el correcto
    public void checkPlayerInput(move m)
    {
        //si el player ya introdujo el input correcto no hace falta volver a comprobarlo
        if (!playerCorrect)
        {
            //si coincide con la solución
            if ((events[lastCollider].leftSound && m == move.left) ||
                (!events[lastCollider].leftSound && m == move.right))
            {
                playerCorrect = true;
                src.Stop();
            }
            //si no, quitamos una vida
            else
            {
                AddLife(-1);
            }
        }
    }

    //el player, al chocar con un trigger, llamará a este método, que identifica el trigger en cuestión y actúa en consecuencia
    public void InitCollision(Collider2D coll)
    {
        //búsqueda del collider en cuestión
        int i = 0;
        while (i < events.Count && events[i].trigger != coll)
            i++;
        //si lo hemos encontrado
        if(i < events.Count)
        {
            //ajustamos el audio
            src.Stop();
            src.loop = true;
            src.clip = events[i].audio;
            src.transform.position = events[i].leftSound ?  leftPoint.transform.position : rightPoint.transform.position;
            src.Play();
            //marcamos
            lastCollider = i;
        }
    }

    //similar al superior pero para cuando el player sale del trigger
    public void ExitCollision(Collider2D coll)
    {
        //paramos audio
        src.Stop();

        //si el player no introdujo el input correcto
        if (!playerCorrect)
        {
            //quitamos una vida
            AddLife(-1);
        }

        //por último, preparamos playerCorrect para el siguiente trigger
        playerCorrect = false;
    }

    public void AddLife(int nLife)
    {
        lifes += nLife;
        if (lifes <= 0)
            print("derrota");
        print("vidas: " + lifes.ToString());
    }

    //para ver los triggers desde el editor
    private void OnDrawGizmos()
    {
        foreach (LabyrinthEvento lb in events)
        {
            //cuidado, solo funciona con BoxCollider2D
            Gizmos.DrawWireCube(lb.trigger.transform.position + (Vector3)lb.trigger.offset, ((BoxCollider2D)lb.trigger).size);
        }
    }
}
