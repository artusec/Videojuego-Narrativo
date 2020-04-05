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
    private const string failString = "fallo registro";
    private const string repeatUserString = "Ya existe un usuario con ese nombre, prueba con otro";
    private const string repeatPassString = "Las contraseñas no coinciden";

    public void Register()
    {
        string user = username.text;
        string response = interaccion_servidor.register_user(user, email.text, pass.text, pass2.text);
        switch (response)
        {
            case failString:
                TextToSpeech.Speak("Fallo registro");
                break;
            case repeatUserString:
                TextToSpeech.Speak(repeatUserString);
                break;
            case repeatPassString:
                TextToSpeech.Speak(repeatPassString);
                break;
            default:
                TextToSpeech.Speak("Se registro el usuario " + user + "correctamente.");
                Invoke("OnSuccess", 0.5f);
                break;
        }
    }

    private void OnSuccess()
    {
        interaccion_servidor.nuevo_juego(username.text);
        GameManager.instance.changeScene("Login");
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