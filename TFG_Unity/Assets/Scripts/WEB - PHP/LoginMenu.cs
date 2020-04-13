using UnityEngine;
using System.Collections;
using UnityEngine.Networking;
using UnityEngine.UI;
using System.Net;
using System.Text;
using System.IO;
using System;

public class LoginMenu : MonoBehaviour
{
    public Text username;
    public Text pass;
    private string user = "";

    public void Login()
    {
        user = username.text;
        if(interaccion_servidor.login_user(user, pass.text) == "1")
        {
            TextToSpeech.Speak("Usuario o contraseña incorrecto");
        }
        else
        {
            TextToSpeech.Speak("Se inicio sesion como " + user + " .Iniciando juego.");
            Invoke("invokeLogin", 3);

        }
    }

    public void invokeLogin()
    {
        GameManager.instance.clearData();
        GameManager.instance.saveUsername(user);
        GameManager.instance.onlinePlay = true;
        GameManager.instance.SetUpPlay();
    }
}