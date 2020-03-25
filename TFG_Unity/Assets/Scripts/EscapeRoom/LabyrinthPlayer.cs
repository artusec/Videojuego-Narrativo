using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class LabyrinthPlayer : MonoBehaviour
{
    //private move registeredMove;
    //solo manejamos conceptualmente una colisión a la vez
    private bool inCollision = false;

    [Tooltip("El sonido que se reproducirá todo el tiempo simulando que el player está corriendo")]
    public AudioSource feet;

    private AudioSource bump;

    private void Start()
    {
        bump = GetComponent<AudioSource>();
        if (bump == null)
            throw new System.Exception("No se encontró el componente AudioSource en el player");
    }

    // Update is called once per frame
    void Update()
    {
        getInput();
    }

    void getInput()
    {
        if (inCollision)
        {
            if (ScreenInput.instance.getInput() == move.right)
            {
                print("intento girar derecha");
                //si fallamos el giro
                if (!LabyrithnManager.instance.checkPlayerInput(move.right))
                {
                    //paramos el sonido de correr y ponemos el sonido de golpe
                    feet.Stop();
                    bump.Play();
                    //volvemos a invocar al sonido de correr solo si seguimos vivos
                    if(LabyrithnManager.instance.GetLifes() > 0)
                        Invoke("RestartRun", 0.5f);
                }
            }
            else if (ScreenInput.instance.getInput() == move.left)
            {
                print("intento girar izquierda");
                if (!LabyrithnManager.instance.checkPlayerInput(move.left))
                {
                    feet.Stop();
                    bump.Play();
                    if (LabyrithnManager.instance.GetLifes() > 0)
                        Invoke("RestartRun", 0.5f);
                }
            }
        }
    }

    private void OnTriggerEnter2D(Collider2D coll)
    {
        inCollision = true;
        LabyrithnManager.instance.InitCollision(coll);
    }

    private void OnTriggerExit2D(Collider2D coll)
    {
        inCollision = false;
        LabyrithnManager.instance.ExitCollision(coll);
    }

    private void RestartRun()
    {
        feet.Play();
    }
}
