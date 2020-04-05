﻿using UnityEngine;
using System.Collections;
using UnityEngine.Networking;
using UnityEngine.UI;
using System.Net;
using System.Text;
using System.IO;
using System;

public class LoginMenu : MonoBehaviour
{
    public InputField username;
    public InputField pass;
    private string failString = "Usuario y/o contraseña incorrectos";

    public void Login()
    {
        string user = username.text;
        if(interaccion_servidor.login_user(user, pass.text) == failString)
        {
            TextToSpeech.Speak("Usuario o contraseña incorrecto");
        }
        else
        {
            TextToSpeech.Speak("Se inicio sesion como " + user);
            // invoke para esperar texto
            TextToSpeech.Speak("Iniciando juego");
            GameManager.instance.user = user;
            GameManager.instance.onlinePlay = true;

            GameManager.instance.SetUpPlay();
        }
    }
}