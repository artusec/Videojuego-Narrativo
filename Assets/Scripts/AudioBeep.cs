using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class AudioBeep : MonoBehaviour
{

    AudioSource source;
    public float speed = 2;
    float actSpeed = 0;
    public float maxDistance = 2;
    float actDist = 2;
    // Start is called before the first frame update
    void Start()
    {
        source = GetComponent<AudioSource>();
    }

    // Update is called once per frame
    void Update()
    {
        if (actSpeed < speed*(actDist/maxDistance)) actSpeed += Time.deltaTime;
        else if(actDist < maxDistance)
        {
            actSpeed = 0;
            source.Play();
            source.pitch = maxDistance/actDist;
            source.volume = actDist / maxDistance;
        }
        RaycastHit2D hit = Physics2D.Raycast(transform.position, Vector2.up);
        if (hit.collider != null)
        {
            actDist = (hit.point - new Vector2(transform.position.x, transform.position.y)).magnitude;
        }
        else actDist = maxDistance;
    }
}
