using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class FingerMove : MonoBehaviour
{
    Vector2 moveInit;
    Vector2 moveEnd;
    public Switchable[] allSwitchs;
    Switchable actual;
    // Start is called before the first frame update
    void Start()
    {

        allSwitchs = GameObject.FindObjectsOfType<Switchable>();
        actual = allSwitchs[0];
        actual.changeColor(false);
    }

    // Update is called once per frame
    void Update()
    {
        init();
        release();
    }

    Vector2 getMousePos()
    {
        return Camera.main.ScreenToWorldPoint(Input.mousePosition);
    }
    void init()
    {
        if(Input.GetMouseButtonDown(0))
        {
            moveInit = getMousePos();
        }
    }
    void release()
    {
        if(Input.GetMouseButtonUp(0))
        {
            moveEnd = getMousePos();
            checkMove();
        }
    }

    void checkMove()
    {
        Vector2 lineVector = moveEnd - moveInit;
        float auxAngle = Vector2.Angle(Vector2.right, lineVector);
        if (moveEnd.y < moveInit.y) auxAngle = 360 - auxAngle;

        if (auxAngle < 90 || auxAngle > 270)
        {
            changeObjective(true);
        }
        else changeObjective(false);
    }

    void changeObjective(bool der)
    {
        print((-5) % 4);
        bool encontrado = false;
        int i = 0;
        while(i < allSwitchs.Length)
        {
        //print((allSwitchs[i].order) % allSwitchs.Length);
            if (!encontrado && der && (actual.order +1)%allSwitchs.Length == (allSwitchs[i].order))
            {
                encontrado = true;
                actual = allSwitchs[i];
                actual.changeColor(false);
            }
            else if(!encontrado && !der && actual.order == 0 && allSwitchs[i].order == allSwitchs.Length-1)
            {
                encontrado = true;
                actual = allSwitchs[i];
                actual.changeColor(false);
            }
            else if (!encontrado && !der && Mathf.Abs(actual.order - 1) % allSwitchs.Length == (allSwitchs[i].order))
            {
                encontrado = true;
                actual = allSwitchs[i];
                actual.changeColor(false);
            }
            else allSwitchs[i].changeColor(true);
            i++;
        }
    }
}
