using UnityEngine;
using UnityEngine.EventSystems;
using System;
using System.Collections;
using UnityEngine.Networking;

public class Menu : MonoBehaviour
{

    private void Update()
    {
        PluginTest p = new PluginTest(); ;
        p.doTask();
    }



    /*public void buttonToSpeech()
    {
        
        StartCoroutine(GetAudioClip());
       
    }
    */

    IEnumerator GetAudioClip()
    {
        //Coje la componente audioSource que hay que tener 
        AudioSource audSrc = gameObject.AddComponent<AudioSource>();
        String Url = "http://api.voicerss.org/?key=fed840ae6af4495d8aab93e3cded0c38&hl=es-Es&c=wav&f=8khz_8bit_mono&src=";
        //Aqui abajo ala URL se le añade lo que quieres que suene por voz, en este caso yo he puesto el nombre del objeto 
        Url += EventSystem.current.currentSelectedGameObject.name;

        using (UnityWebRequest www = UnityWebRequestMultimedia.GetAudioClip(Url, AudioType.WAV))
        {
            yield return www.SendWebRequest();

            if (www.isNetworkError)
            {
                Debug.Log(www.error);
            }
            else
            {
                //Se le mete el clip al audioSource y play
                audSrc.clip = DownloadHandlerAudioClip.GetContent(www);
                audSrc.Play();
            }

        }
    }


    
}
