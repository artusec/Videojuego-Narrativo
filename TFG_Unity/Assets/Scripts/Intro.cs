using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Intro : MonoBehaviour
{
    public ScreenInput input;
    move mov;

    public float [] normalSteps;
    public AudioClip normalStep;
    public AudioClip grassStep;
    AudioSource src;


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
        if (mov == move.pressing)
        {
            src.UnPause();
        }
        else src.Pause();

        if (!src.isPlaying)
        {
            src.clip = grassStep;
            src.Play();
            src.Pause();
        }
    }
}
