using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class STT:MonoBehaviour
{
    void Start()
    {
        this.gameObject.name = "STTUnity";
    }
    public static void Listen()
    {
        using (AndroidJavaClass jc = new AndroidJavaClass("com.unity3d.player.UnityPlayer"))
        {
            using (AndroidJavaObject jo = jc.GetStatic<AndroidJavaObject>("currentActivity"))
            {
                Debug.Log("StartListening1");
                jo.Call("StartListening");
            }
        }
    }
    public void OnResult(string recognizedResult)
    {
        GameObject.Find("TextSpoken").GetComponent<Text>().text = recognizedResult;
    }
}
