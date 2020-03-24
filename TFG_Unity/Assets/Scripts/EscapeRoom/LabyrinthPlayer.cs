using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class LabyrinthPlayer : MonoBehaviour
{
    //private move registeredMove;
    //solo manejamos conceptualmente una colisión a la vez
    private bool inCollision = false;

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
                LabyrithnManager.instance.checkPlayerInput(move.right);
            }
            else if (ScreenInput.instance.getInput() == move.left)
            {
                print("intento girar izquierda");
                LabyrithnManager.instance.checkPlayerInput(move.left);
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
}
