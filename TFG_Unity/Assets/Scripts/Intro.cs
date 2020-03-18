using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Intro : MonoBehaviour
{
    public ScreenInput input;
    move mov;


    //STEPS
    public Animator anim;
    public float normalStepsDuration = 5;
    public AudioClip[] normalSteps;
    public AudioClip grassStep;
    public int grassSteps = 4;
    public AudioClip[] woodSteps;
    AudioSource src;
    int actualSteps = 0;

    int phase = 0;

    //INTRO
    int genPhase = 1;
    public float introTime = 2;
    float auxIntro = 0;
    public AudioSource srcIntro;
    public SpriteRenderer fondo;

    //CINTA
    public AudioClip rasgado;
    int cintaPhase = 0;
    public Animator []cintas;
    int numQuitadas = 0;

    // Start is called before the first frame update
    void Start()
    {
        src = GetComponent<AudioSource>();
        src.clip = normalSteps[0];
        src.Play();
        src.Pause();
    }

    // Update is called once per frame
    void FixedUpdate()
    {
        if (genPhase == 1)
            intro();
        else if (genPhase == 2)
            steps();
        else if (genPhase == 3)
            cinta();
    }

    //Fade-In inicial
    void intro()
    {
        if (auxIntro < introTime)
        {
            auxIntro += Time.deltaTime;
            float valueA = auxIntro / introTime;
            fondo.color = new Color(0,0,0, 1-valueA);
            srcIntro.volume = valueA*0.9f;
        }
        else
        {
            genPhase = 2;
            anim.Play("Idle");
        }
    }

    //Controla los pasos realizados con el Input en pantalla
    void steps()
    {
        mov = input.getInput();
        if (src.isPlaying)
        {
            anim.enabled = true;
        }
        else
        {
            anim.enabled = false;
            if (actualSteps >= normalSteps.Length + grassSteps + woodSteps.Length)
                genPhase = 3;
        }
        if (mov == move.pressing)
        {
            if (phase == 0 && !src.isPlaying)
            {
                if (actualSteps < normalSteps.Length)
                {
                    src.clip = normalSteps[actualSteps];
                    src.Play();
                    actualSteps++;
                }
                else
                {
                    src.clip = grassStep;
                    phase = 1;
                }
            }
            if (phase == 1 && !src.isPlaying)
            {
                if (actualSteps < normalSteps.Length + grassSteps)
                {
                    src.clip = grassStep;
                    src.Play();
                    actualSteps++;
                }
                else
                {
                    src.clip = woodSteps[0];
                    phase = 2;
                }
            }
            if (phase == 2 && !src.isPlaying)
            {
                if (actualSteps < normalSteps.Length + grassSteps + woodSteps.Length)
                {
                    src.clip = woodSteps[actualSteps - normalSteps.Length - grassSteps];
                    src.Play();
                    actualSteps++;
                }
                else
                {
                    src.Stop();
                    genPhase = 3;
                }
            }
        }
    }

    void cinta()
    {
        mov = input.getInput();
        if (cintaPhase == 0 && mov == move.pressed)
            cintaPhase = 1;
        else if (cintaPhase == 1 && (mov == move.up || mov == move.left || mov == move.down || mov == move.right))
        {
            src.PlayOneShot(rasgado);
            cintas[numQuitadas].Play("Quita");
            numQuitadas++;
        }
        if(numQuitadas >= cintas.Length)
        {
            cintaPhase = 2;
            //Sale
            anim.enabled = true;
            anim.Play("Enter");
        }
    }
}
