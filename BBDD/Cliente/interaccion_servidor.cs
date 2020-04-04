using UnityEngine;
using System.Collections;
using UnityEngine.Networking;
using UnityEngine.UI;
using System.Net;
using System.Text;
using System.IO;
using System;

public class interaccion_servidor : MonoBehaviour
{
    public string url = "http://laslomasiii.serveftp.net:4398/";
    public string peticion = "";

    public void login_user(string usuario, string pass)
    {
        peticion = peticion + "username=" + usuario + "&pass=" + pass;
        Upload(peticion, "login_user.php");
    }

    public void register_user(string usuario, string email, string pass, string pass2)
    {
        peticion = "username=" + username + "&email=" + email + "&pass=" + pass + "&pass2=" + pass2;
        Upload(peticion, "register_user.php");
    }

    public void nuevo_juego(string usuario)
    {
        peticion = "username=" + username;
        Upload(peticion, "nuevo_juego.php");
    }

    public void guardar_partida(string usuario, Dictionary<string, string> datos)
    {
        peticion = "username=" + username;
        foreach(var item in datos)
        {
            peticion = peticion + "&" + item.Key + "=" + item.Value;
        }
        Upload(peticion, "guardar_partida.php");
    }

    public void cargar_partida(string usuario)
    {
        peticion = "username=" + username;
        Upload(peticion, "cargar_partida.php");
    }

    public void borrar_usuario(string usuario)
    {
        peticion = "username=" + username;
        Upload(peticion, "borrar_usuario.php");
    }

    void Start()
    {

    }

    void Upload(string peticion, srting archivo)
    {
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


        using (dataStream = response.GetResponseStream())
        {
            StreamReader reader = new StreamReader(dataStream);
            string responseFromServer = reader.ReadToEnd();

            // Respuesta del servidor 
            Debug.Log(responseFromServer);
        }
        WebResponse httpResponse = httpRequest.GetResponse();
    }
}