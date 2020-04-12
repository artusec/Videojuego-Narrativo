using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class STT : MonoBehaviour
{
    // Patron Singleton
    public static STT instance;

    // Texto que recibirá el resultado de la sintesis de texto
    private Text targetString = null;

    // Gestion instancia singleton
    void Awake()
    {
        this.gameObject.name = "STTUnity"; // para comunicacion con el plugin
        if (STT.instance == null)
        {
            instance = this;
        }

        else Destroy(gameObject);
    }


    // Asigna el texto que lo recibe y llama a sintesis de texto
    public void Listen(Text target)
    {
        targetString = target;
        Debug.Log("StartListening1");

#if UNITY_ANDROID && !UNITY_EDITOR
        using (AndroidJavaClass jc = new AndroidJavaClass("com.unity3d.player.UnityPlayer"))
        {
            using (AndroidJavaObject jo = jc.GetStatic<AndroidJavaObject>("currentActivity"))
            {
                jo.Call("StartListening");
            }
        }
#endif
    }


    // Metodo llamado con el resultado de la sintesis, asigna el texto
    public void OnResult(string recognizedResult)
    {
        targetString.text = recognizedResult;
    }
}
