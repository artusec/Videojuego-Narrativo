using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Intro : MonoBehaviour
{
    public ScreenInput input;
    move mov;

    float auxTime = 0;
    public float normalStepsDuration = 5;
    public AudioClip normalStep;
    public AudioClip grassStep;
    public int grassSteps = 4;
    public AudioClip woodStep;
    public int woodSteps = 5;
    AudioSource src;
    int actualSteps = 0;

    int phase = 0;

    // Start is called before the first frame update
    void Start()
    {
        src = GetComponent<AudioSource>();
        src.clip = normalStep;
        src.Play();
        src.Pause();
    }

    // Update is called once per frame
    void Update()
    {
        mov = input.getInput();
        if (phase == 0)
        {
            if (mov == move.pressing)
            {
                auxTime += Time.deltaTime;
                src.UnPause();
            }
            else src.Pause();

            if (auxTime >= normalStepsDuration)
            {
                src.clip = grassStep;
                src.Play();
                src.Pause();
                phase = 1;
            }
        }
        else if(mov == move.pressing)
        {
            src.UnPause();
            if(phase != 3 && !src.isPlaying)
            {
                actualSteps++;
                src.Play();
            }
            if(phase == 1 && actualSteps > grassSteps)
            {
                src.clip = woodStep;
                src.Play();
                src.Pause();
                phase = 2;
            }
            if (phase == 2 && actualSteps > woodSteps + grassSteps)
            {
                phase = 3;
                src.Stop();
            }
        }
    }
}
