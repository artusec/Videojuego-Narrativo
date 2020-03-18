using UnityEngine;
using System.Collections;
using UnityEngine.Networking;
using UnityEngine.UI;

public class register : MonoBehaviour
{
    // laslomasiii.serveftp.net:4398 -> 192.168.1.57:80
    public string url = "http://localhost/register_user.php";

    public InputField username;
    public InputField email;
    public InputField pass;
    public InputField pass2;
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
        form.AddField("email", email.text);
        form.AddField("pass", pass.text);
        form.AddField("pass2", pass2.text);

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