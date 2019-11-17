using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Switchable : MonoBehaviour
{
    public int order = 1;
    SpriteRenderer spr;
    public AudioClip clip;
    AudioManager mng;
    // Start is called before the first frame update
    void Start()
    {
        spr = GetComponent<SpriteRenderer>();
        mng = GameObject.FindObjectOfType<AudioManager>();
    }

    // Update is called once per frame
    void Update()
    {
        
    }
    public void changeColor(bool reset)
    {
        if (reset) spr.color = Color.white;
        else
        {
            spr.color = Color.red;
            mng.playSound(clip);
        }
    }
}
