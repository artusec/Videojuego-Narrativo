using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;


public enum move {nullMov, up, right, down, left, pressed, pressing, click, doubleClick, help};
public class ScreenInput : MonoBehaviour
{
    public static ScreenInput instance;
    Camera cam;
    move lastInput;

    Vector2 initPos;
    Vector2 endPos;
    float moveTime = 0;

    public float minDistClick = 0.25f;
    public float doubleClickTime = 0.25f;
    float lastClick = 0;

    public float helpTime = 2;

    bool activated = true;
    private void Awake()
    {
        instance = this;
        cam = Camera.main;
    }

    // Update is called once per frame
    void Update()
    {
        if(activated)
            lastInput = swipeScreen();
    }
    public bool released(move mov)
    {
        if (mov == move.up || mov == move.right || mov == move.down || mov == move.left || mov == move.click) return true;
        else return false;
    }
    public void deactivate(float time)
    {
        activated = false;
        lastInput = move.nullMov;
        Invoke("activate", time);
    }
    public void activate()
    {
        activated = true;
    }
    public move getInput()
    {
        return lastInput;
    }
    move swipeScreen()
    {
        //Presiona con el dedo
        if (Input.GetMouseButtonDown(0))
        {
            moveTime = 0;
            initPos = cam.ScreenToViewportPoint(Input.mousePosition);
            return move.pressed;
        }
        //Levanta el dedo
        else if (Input.GetMouseButtonUp(0))
        {
            endPos = cam.ScreenToViewportPoint(Input.mousePosition);
            float angleSwipe = Vector2.Angle(Vector2.right, endPos - initPos);
            float angleSwipe2 = Vector2.Angle(Vector2.down, endPos - initPos);

            //Si el recorrido del dedo es mayor que un mínimo
            if (Vector2.Distance(endPos, initPos) > minDistClick)
            {
                //UP
                if (angleSwipe2 > 135)
                {
                    //print("up");
                    return move.up;
                }
                //RIGHT
                else if (angleSwipe < 45)
                {
                    //print("right");
                    return move.right;
                }
                //DOWN
                else if (angleSwipe2 < 45)
                {
                    //print("down");
                    return move.down;
                }
                //LEFT
                else if (angleSwipe > 135)
                {
                    //print("left");
                    return move.left;
                }
                //JUST IN CASE
                else
                {
                    //print("nullMov");
                    return move.nullMov;
                }
            }
            //CLICK (Si el dedo no recorre la distancia mínima)
            else
            {
                //DOBLE CLICK
                if (lastClick < doubleClickTime)
                {
                    //print("doubleClick");
                    lastClick = 0;
                    return move.doubleClick;
                }
                //CLICK NORMAL
                else
                {
                    //print("click");
                    lastClick = 0;
                    return move.click;
                }
            }
        }
        //IS PRESSING
        else if (Input.GetMouseButton(0))
        {
            moveTime += Time.deltaTime;
            if(moveTime >= helpTime && (Vector2.Distance(cam.ScreenToViewportPoint(Input.mousePosition), initPos) <= minDistClick))
            {
                //return move.help;
            }
            //print("pressing");
            return move.pressing;
        }
        //NO HACE NADA
        else
        {
            lastClick += Time.deltaTime;
            return move.nullMov;
        }
    }
}
