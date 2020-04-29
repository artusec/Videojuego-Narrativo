using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Ending : MonoBehaviour
{

    public AudioSource src;
    public AudioClip loop;
    bool started = false;
    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        if (started && !src.isPlaying && src.clip != loop)
        {
            src.clip = loop;
            src.loop = true;
            src.Play();
        }
    }

    public void startMusic()
    {
        src.Play();
        started = true;
    }
    public void guardarFin()
    {
        GameManager.instance.gameEnd();
    }
}
