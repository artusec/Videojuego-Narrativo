using UnityEngine;
using System.Collections.Generic;
using UnityEngine.Networking;
using UnityEngine.UI;
using System.Net;
using System.Text;
using System.IO;
using System;

public enum PetitionType { LOGIN, REGISTER, NEW_GAME, LOAD, SAVE, DELETE_USER, NONE};

public static class interaccion_servidor 
{
    public static string url = "http://laslomasiii.serveftp.net:4398/";
    public static string peticion = "";
    private static PetitionType type = PetitionType.NONE;

    public static string login_user(string usuario, string pass)
    {
        type = PetitionType.LOGIN;
        peticion = "username=" + usuario + "&pass=" + pass;
        return Upload(peticion, "login_user.php");
    }

    public static string register_user(string usuario, string email, string pass, string pass2)
    {
        type = PetitionType.REGISTER;
        peticion = "username=" + usuario + "&email=" + email + "&pass=" + pass + "&pass2=" + pass2;
        return Upload(peticion, "register_user.php");
    }

    public static string nuevo_juego(string usuario)
    {
        type = PetitionType.NEW_GAME;
        peticion = "username=" + usuario;
        return Upload(peticion, "nuevo_juego.php");
    }

    public static string guardar_partida(string usuario, Dictionary<string, string> datos)
    {
        type = PetitionType.SAVE;
        peticion = "username=" + usuario;
        foreach(var item in datos)
        {
            peticion = peticion + "&" + item.Key + "=" + item.Value;
        }
        return Upload(peticion, "guardar_partida.php");
    }

    public static string cargar_partida(string usuario)
    {
        type = PetitionType.LOAD;
        peticion = "username=" + usuario;
        return Upload(peticion, "cargar_partida.php");
    }

    public static string borrar_usuario(string usuario)
    {
        type = PetitionType.DELETE_USER;
        peticion = "username=" + usuario;
        return Upload(peticion, "borrar_usuario.php");
    }


    private static string Upload(string peticion, string archivo)
    {
        Debug.Log(peticion);
        HttpWebRequest httpRequest = HttpWebRequest.Create(url + archivo) as HttpWebRequest;
        httpRequest.Method = "POST";
        httpRequest.ProtocolVersion = HttpVersion.Version11;
        string parameters = peticion;
        httpRequest.ContentLength = Encoding.ASCII.GetByteCount(parameters);
        httpRequest.ContentType = "application/x-www-form-urlencoded";
        byte[] byteArray = Encoding.UTF8.GetBytes(parameters);
        Stream dataStream = httpRequest.GetRequestStream();
        dataStream.Write(byteArray, 0, byteArray.Length);
        dataStream.Close();
        WebResponse response = httpRequest.GetResponse();

        // Status -> OK = todo bien  
        Debug.Log(((HttpWebResponse)response).StatusDescription);

        string responseFromServer;
        using (dataStream = response.GetResponseStream())
        {
            StreamReader reader = new StreamReader(dataStream);
            responseFromServer = reader.ReadToEnd();

            // Respuesta del servidor 
            Debug.Log(responseFromServer);
        }
        WebResponse httpResponse = httpRequest.GetResponse();

        return OnReceiveResponse(responseFromServer);
    }

    private static string OnReceiveResponse(string response)
    {
        string s = response;
        switch (type)
        {
            case PetitionType.LOAD:
                if (s != "Algo ha fallado")
                {
                    s = s.Remove(s.Length - 1);
                }
                break;
            default: break;
        }
        return s;
    }
}