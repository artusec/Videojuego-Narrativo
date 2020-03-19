using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Networking;


/// <summary>
/// Clse que se encarga de reproducir las etiquetas del ScreenReader,
/// también puede usarse para reproducir sonido en base a otros textos
/// </summary>
public class TTS : MonoBehaviour
{
    // Instancia de la clase (patron singleton)
    public static TTS instance;

    // Url de la pagina que genera los audios
    private string baseUrl = "http://api.voicerss.org/?key=fed840ae6af4495d8aab93e3cded0c38&hl=es-Es&c=wav&f=8khz_8bit_mono&src=";

    // AudioSource que reproduce los audios
    public AudioSource source = null;

    // Gestion del singleton, y se comprueba que tenga audiosource
    void Awake()
    {
        if(source == null) source = gameObject.AddComponent<AudioSource>();
        if (instance != null) GameObject.Destroy(instance);
        else instance = this;

        DontDestroyOnLoad(this);
    }

    // Reproduce el clip asociado
    public void PlayClip(AudioClip c)
    {
        source.clip = c;
        source.Play();
    }

    public void PlayTTS(string s)
    {
        StartCoroutine("TTSPlay", s);
    }
    /// <summary>
    /// Obtiene y reproduce el TTS correspondiente al string recibido, con corrutinas, para no pausar la ejecución
    /// aunque esto conlleva una pequeña espera
    /// </summary>
    /// <param name="s"></param>
    /// <returns></returns>
    IEnumerator TTSPlay(string s)
    {
        // Mandamos la request y esperamos a recibir el audio
        using (UnityWebRequest www = UnityWebRequestMultimedia.GetAudioClip(baseUrl + s, AudioType.WAV))
        {
            yield return www.SendWebRequest();

            if (www.isNetworkError)
            {
                Debug.Log(www.error);
            }
            else
            {
                //Se le mete el clip al audioSource y se reproduce
                source.clip = (DownloadHandlerAudioClip.GetContent(www));
                source.Play();
            }   
        }
    }

}
