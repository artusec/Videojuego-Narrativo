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
    public InputField username;
    public InputField email;
    public InputField pass;
    public InputField pass2;

    public void Register()
    {
        string user = username.text;
        string response = interaccion_servidor.register_user(user, email.text, pass.text, pass2.text);
        switch (response)
        {
            case "0":
                TextToSpeech.Speak("Se registro el usuario " + user + "correctamente.");
                GameManager.instance.clearData();
                GameManager.instance.saveUsername(user);
                Invoke("OnSuccess", 0.5f);
                break;
            case "1":
                TextToSpeech.Speak("Ya existe un usuario con ese nombre, prueba con otro");
                break;
            case "2":
                TextToSpeech.Speak("Las contraseñas no coinciden");
                break;
        }
    }

    private void OnSuccess()
    {
        interaccion_servidor.nuevo_juego(username.text);
        GameManager.instance.changeScene("Intro");
    }

    // que respuesta se recibe al crear un usuario?
    /*string user = username.text;
    string succesString = "Se registro el usuario " + user + "correctamente.";
    string response = interaccion_servidor.register_user(user, email.text, pass.text, pass2.text);

        if (response == succesString)
        {
            TextToSpeech.Speak(succesString);
        }
        else
        {
            TextToSpeech.Speak(response);
        }*/
}