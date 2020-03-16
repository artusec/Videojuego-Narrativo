using UnityEngine;
using System.Collections;
using UnityEngine.Networking;
using UnityEngine.UI;

public class login : MonoBehaviour
{
    // laslomasiii.serveftp.net:4398 -> 192.168.1.57:80
    public string url = "http://localhost/login_user.php";

    public InputField username;
    public InputField pass;


    public void entrar()
    {
        StartCoroutine(Upload());
    }
    void Start()
    {

    }

    IEnumerator Upload()
    {
        WWWForm form = new WWWForm();
        form.AddField("username", username.text);
        form.AddField("pass", pass.text);


        using (UnityWebRequest www = UnityWebRequest.Post(url, form))
        {
            yield return www.SendWebRequest();

            if (www.isNetworkError || www.isHttpError)
            {
                Debug.Log(www.error);
            }
            else
            {
                Debug.Log("Form upload complete!");
                Debug.Log(www.responseCode);
            }
        }
    }
}