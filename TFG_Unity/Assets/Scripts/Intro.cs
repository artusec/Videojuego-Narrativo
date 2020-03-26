using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class Intro : MonoBehaviour
{
    public AudioSource ttsSource;
    public AudioClip[] ttss;
    ScreenInput input;
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

    //FIRE
    public SpriteRenderer fireSprite;
    public float fireStart = 2;
    public float fireInt = 2;
    public float fireEnd = 2;
    float actualFire = 0;
    Vector3 initPos;
    Color naranja;

    //INTRO
    int genPhase = 0;
    public float introTime = 2;
    float auxIntro = 0;
    public AudioSource srcIntro;
    public AudioClip ambientClip;
    public SpriteRenderer fondo;

    //CINTA
    public AudioClip rasgado;
    public AudioClip doorOpen;
    int cintaPhase = 0;
    public Animator []cintas;
    int numQuitadas = 0;
    public float closingTime = 1;
    float auxClosing = 0;

    // Start is called before the first frame update
    void Start()
    {
        input = ScreenInput.instance;
        src = GetComponent<AudioSource>();
        src.clip = normalSteps[0];
        src.Play();
        src.Pause();
        initPos = fireSprite.transform.position;
    }
    private void Update()
    {
        /*
        if(mov == move.help)
        {
            if(ttsSource.clip != null)
                ttsSource.Play();
        }
        */
    }
    // Update is called once per frame
    void FixedUpdate()
    {
        if (genPhase == 0)
            fire();
        else if (genPhase == 1)
            intro();
        else if (genPhase == 2)
            steps();
        else if (genPhase == 3)
            cinta();
        else if (genPhase == 4)
            doorOpening();
    }
    void playSound(int ttsType)
    {
        ttsSource.PlayOneShot(ttss[ttsType]);
    }
    //Fire
    void fire()
    {
        actualFire += Time.deltaTime;
        fireSprite.transform.position = initPos + new Vector3(0.0f, Mathf.Sin(Time.time*2)/5, 0.0f);
        if (actualFire < fireStart)
        {
            float valueA = actualFire / fireStart;
            fireSprite.color = new Color(valueA, valueA/2, 0);
            naranja = fireSprite.color;
        }
        else if(actualFire < fireStart+fireInt)
        {
            fireSprite.color = Color.Lerp(naranja, Color.red, (actualFire-fireStart)/(fireInt));
        }
        else if(actualFire < fireStart+fireInt+fireEnd)
        {
            float valueA = (actualFire-fireInt-fireStart )/ fireEnd;
            fireSprite.color = new Color(1, 0, 0, 1-valueA);
        }
        else
        {
            genPhase = 1;
            srcIntro.clip = ambientClip;
            srcIntro.loop = true;
            srcIntro.Play();
            srcIntro.volume = 0;
        }
    }

    //Fade-In inicial
    void intro()
    {
        if (auxIntro < introTime)
        {
            auxIntro += Time.deltaTime;
            float valueA = auxIntro / introTime;
            fondo.color = new Color(0,0,0, 1-valueA);
            srcIntro.volume = valueA*0.3f;
        }
        else
        {
            genPhase = 2;
            anim.Play("Idle");
            playSound(0);
            //TTS.instance.PlayTTS("Mantén pulsado para avanzar");
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
            {
                genPhase = 3;
                playSound(1);
                //TTS.instance.PlayTTS("Desliza en cualquier dirección para romper las bandas policiales");
            }
        }
        if (mov == move.pressing || mov == move.help)
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
        if(cintaPhase == 1 && numQuitadas >= cintas.Length)
        {
            cintaPhase = 2;
            Invoke("doorOpened", 1);
        }
    }
    void changePhase(int phase)
    {
        genPhase = phase;
    }
    void doorOpened()
    {
        anim.enabled = true;
        anim.Play("Enter");
        src.PlayOneShot(doorOpen);
        genPhase = 4;
    }
    void doorOpening()
    {
        if (auxClosing < closingTime)
        {
            auxClosing += Time.deltaTime;
            srcIntro.volume = (1-(auxClosing / closingTime))*0.9f;
        }
        else
        {
            //CAMBIO DE ESCENA
            Invoke("changeScene", 1);
        }
    }
    void changeScene()
    {
        GameManager.instance.changeScene("Room1", true);
    }
}
