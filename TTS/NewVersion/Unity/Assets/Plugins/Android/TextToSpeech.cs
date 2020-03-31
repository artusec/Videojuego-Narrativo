using System.Collections;
using System.Collections.Generic;
using UnityEngine;


public class TextToSpeech :MonoBehaviour
{
    public static TextToSpeech myInstance;

    void Awake()
    {
        myInstance = this;
    }
    
    private AndroidJavaObject TTS = null;
    private AndroidJavaObject activityContext = null;

    private string lang = "ES";
    private string speed = "Normal";
    //public float Speed { get{return _speed;} set { SetSpeed(value); } }
  
    public TextToSpeech()
    {
        //Initialize();

    }

    public void changeLang(string l)
    {
#if UNITY_ANDROID && !UNITY_EDITOR
        lang = l;
        TTS.Call("changeLang",l);
#endif
    }
    public void changeSpeed(string s)
    {
#if UNITY_ANDROID && !UNITY_EDITOR
        speed = s;
        TTS.Call("changeSpeed",speed);
#endif
    }

    public TextToSpeech(float speed)
    {
        //Initialize();
        //this.Speed = speed;
        //SetSpeed(this.Speed);
#if UNITY_ANDROID && !UNITY_EDITOR
        Initialize();
#endif
    }

    public void Speak(string toSay)
    {
#if UNITY_ANDROID && !UNITY_EDITOR

        if (TTS == null)
        {
            Initialize();
        }

        TTS.Call("Speak", toSay);

#endif

    }
    private void Initialize()
    {
        if (TTS == null)
        {
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
        }


    }
}
