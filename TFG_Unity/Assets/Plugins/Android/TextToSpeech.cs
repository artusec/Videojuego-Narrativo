using System.Collections;
using System.Collections.Generic;
using UnityEngine;


public static class TextToSpeech
{
    private static AndroidJavaObject TTS = null;
    private static AndroidJavaObject activityContext = null;

    private static string lang = "ES";
    private static string speed = "Normal";
    //public float Speed { get{return _speed;} set { SetSpeed(value); } }

    static TextToSpeech()
    {
        Initialize();
    }

    public static void changeLang(string l)
    {
#if UNITY_ANDROID && !UNITY_EDITOR
        lang = l;
        TTS.Call("changeLang",l);
#endif
    }
    public static void changeSpeed(string s)
    {
#if UNITY_ANDROID && !UNITY_EDITOR
        speed = s;
        TTS.Call("changeSpeed",speed);
#endif
    }

    public static void Speak(string toSay)
    {
#if UNITY_ANDROID && !UNITY_EDITOR

        if (TTS == null)
        {
            Initialize();
        }

        TTS.Call("Speak", toSay);
#else
        Debug.Log(toSay);
#endif
    }

    private static void Initialize()
    {
#if UNITY_ANDROID && !UNITY_EDITOR
        using (AndroidJavaClass activityClass = new AndroidJavaClass("com.unity3d.player.UnityPlayer"))
        {
            activityContext = activityClass.GetStatic<AndroidJavaObject>("currentActivity");
        }

        using (AndroidJavaClass pluginClass = new AndroidJavaClass("com.fer.ttslib.TTS"))
        {
            if (pluginClass != null)
            {
                TTS = pluginClass.CallStatic<AndroidJavaObject>("getInstance");
                TTS.Call("setContext", activityContext);
            }
        }
#endif
    }
}
