using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Networking;


// CLASE DEPRECADA

/// <summary>
/// Clase que se encarga de reproducir las etiquetas del ScreenReader,
/// también puede usarse para reproducir sonido en base a otros textos
/// implementacion del tts deprecada basada en api web
/// </summary>
public class TTS : MonoBehaviour
{
    // Instancia de la clase (patron singleton)
    public static TTS instance;

    // Url de la pagina que genera los audios
    private string baseUrl = "http://api.voicerss.org/?key=2a6b11f65029455eadb5ab59fb9c05ef&hl=es-Es&c=wav&f=8khz_8bit_mono&src=";

    // AudioSource que reproduce los audios
    AudioSource source;

    // Gestion del singleton, y se comprueba que tenga audiosource
    void Awake()
    {
        if (GetComponent<AudioSource>() == null) source = gameObject.AddComponent<AudioSource>();
        else source = GetComponent<AudioSource>();
        if (instance != null) Destroy(gameObject);
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
