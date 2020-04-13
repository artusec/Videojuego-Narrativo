using UnityEngine;
using System.Collections;
using UnityEngine.Networking;
using UnityEngine.UI;
using System.Net;
using System.Text;
using System.IO;
using System;

public class RegisterMenu : MonoBehaviour
{
    public Text username;
    public Text email;
    public Text pass;
    public Text pass2;

    public void Register()
    {
        string user = username.text;
        string response = interaccion_servidor.register_user(user, email.text, pass.text, pass2.text);
        switch (response)
        {
            case "1":
                TextToSpeech.Speak("Ya existe un usuario con ese nombre, prueba con otro.");
                break;
            case "2":
                TextToSpeech.Speak("Las contraseñas no coinciden.");
                break;
            // Cambiar TODO , CAMBIO , MAL , PONER CASO 0, DEFAULT PORQUE NO VA BIEN EL SERVIDOR
            default:
                TextToSpeech.Speak("Se registro el usuario " + user + " . Iniciando juego.");
                GameManager.instance.clearData();
                GameManager.instance.saveUsername(user);
                Invoke("OnSuccess", 4f);
                break;
        }
    }

    private void OnSuccess()
    {
        interaccion_servidor.nuevo_juego(username.text);
        GameManager.instance.changeScene("Intro");
    }
}