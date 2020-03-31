using UnityEngine;
using System.Collections;
using UnityEngine.Networking;
using UnityEngine.UI;
using System.Net;
using System.Text;
using System.IO;
using System;

public class guardar_partida : MonoBehaviour
{
    public string url = "http://laslomasiii.serveftp.net:4398/guardar_juego.php";

    public void entrar(string usuario, Dictionary<string, string> datos)
    {
        Upload(usuario, datos);
    }

    void Start()
    {

    }

    void Upload(string usuario, Dictionary<string, string> datos)
    {

        /*Dictionary<string, string> openWith = new Dictionary<string, string>();

        openWith.Add("txt", "notepad.exe");
        openWith.Add("bmp", "paint.exe");
        openWith.Add("dib", "paint.exe");
        openWith.Add("rtf", "wordpad.exe");*/

        string peticion = "";

        foreach(var item in datos)
        {
            peticion = peticion + "&" + item.Key + "=" + item.Value;
        }


        HttpWebRequest httpRequest = HttpWebRequest.Create(url) as HttpWebRequest;
        httpRequest.Method = "POST";
        httpRequest.ProtocolVersion = HttpVersion.Version11;
        string parameters = "username=" + usuario + peticion;
        httpRequest.ContentLength = Encoding.ASCII.GetByteCount(parameters);
        httpRequest.ContentType = "application/x-www-form-urlencoded";

        byte[] byteArray = Encoding.UTF8.GetBytes(parameters);
        // Get the request stream.  
        Stream dataStream = httpRequest.GetRequestStream();
        // Write the data to the request stream.  
        dataStream.Write(byteArray, 0, byteArray.Length);
        // Close the Stream object.  
        dataStream.Close();

        // Get the response.  
        WebResponse response = httpRequest.GetResponse();
        // Display the status. OK = todo bien  
        Debug.Log(((HttpWebResponse)response).StatusDescription);


        using (dataStream = response.GetResponseStream())
        {
            // Open the stream using a StreamReader for easy access.  
            StreamReader reader = new StreamReader(dataStream);
            // Read the content.  
            string responseFromServer = reader.ReadToEnd();
            // Display the content.  
            Debug.Log(responseFromServer);
        }
        WebResponse httpResponse = httpRequest.GetResponse();
    }
}