using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class InitialScene : MonoBehaviour
{
    public float initDelay = 1;
    public AudioClip initClip;
    AudioSource src;
    // Start is called before the first frame update
    void Start()
    {
        src = GetComponent<AudioSource>();
        Invoke("startSound", initDelay);
    }

    // Update is called once per frame
    void Update()
    {
        
    }
    void startSound()
    {
        src.clip = initClip;
        src.Play();
        if (initClip != null)
            Invoke("Change", initClip.length);
        else Change();
    }
    void Change()
    {
        GameManager.instance.changeScene("MainMenu");
    }
}
