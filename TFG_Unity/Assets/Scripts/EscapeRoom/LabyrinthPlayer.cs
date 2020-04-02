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

    public AudioClip footSlip;
    public AudioClip[] pasos;
    int randPaso = 0;
    public float walkSpeed = 1;
    float auxWalk = 0;

    public float turnTime = 0.5f;
    float auxTurn = 0;
    Vector3 initTurn;
    bool turning = false;
    Vector3 angleObj;

    //auxiliar para no estar haciendo llamadas al singleton una vez el juego haya empezado
    private bool initGame = false;

    private void Start()
    {
        auxWalk = walkSpeed;
        bump = GetComponent<AudioSource>();
        if (bump == null)
            throw new System.Exception("No se encontró el componente AudioSource en el player");
    }

    // Update is called once per frame
    void Update()
    {
        if (!initGame)
            initGame = LabyrithnManager.instance.initGame;
        else
        {
            getInput();
            pasosSound();
            turn();
        }
    }

    public void reinit()
    {
        initTurn = Vector3.zero;
        transform.eulerAngles = Vector3.zero;
    }

    void turn()
    {
        if (auxTurn < turnTime)
        {
            auxTurn += Time.deltaTime;
            transform.eulerAngles = Vector3.Lerp(initTurn, angleObj, auxTurn/turnTime);
        }
        else angleObj = transform.eulerAngles;
    }

    void pasosSound()
    {
        if (auxWalk < walkSpeed) auxWalk += Time.deltaTime;
        else
        {
            doStep();
        }

    }
    public void doStep()
    {
        auxWalk = 0;
        randPaso = Random.Range(0, pasos.Length);
        feet.clip = pasos[randPaso];
        feet.Play();
    }
    void getInput()
    {
        if (inCollision)
        {
            if (ScreenInput.instance.getInput() == move.right)
            {
                angleObj = new Vector3(0, 0, -90);
                auxTurn = 0;
                print("intento girar derecha");
                bump.clip = footSlip;
                bump.Play();
                auxWalk = 0;
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
                angleObj = new Vector3(0, 0, 90);
                auxTurn = 0;
                bump.clip = footSlip;
                bump.Play();
                auxWalk = 0;
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
        reinit();
        LabyrithnManager.instance.ExitCollision(coll);
    }

    private void RestartRun()
    {
        feet.Play();
    }
}
