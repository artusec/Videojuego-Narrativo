using UnityEngine;

/// <summary>
/// Clase encargada de producir las vibraciones en dispositivos Android
/// Clase estática para permitir llamadas desde cualquier lugar sin instancia
/// </summary>
public static class Vibration
{
    // Obtenemos las clases de Android que utilizaremos (podemos obtenerlas así por 
    // ser clases básicas o consideradas ervicios
#if UNITY_ANDROID && !UNITY_EDITOR
	public static AndroidJavaClass unityPlayer = new AndroidJavaClass("com.unity3d.player.UnityPlayer");
	public static AndroidJavaObject currentActivity = unityPlayer.GetStatic<AndroidJavaObject>("currentActivity");
	public static AndroidJavaObject vibrator =currentActivity.Call<AndroidJavaObject>("getSystemService", "vibrator");
	public static AndroidJavaObject context = currentActivity.Call<AndroidJavaObject>("getApplicationContext");
#endif

    /// <summary>
    /// Vibración normal de duración milliseconds
    /// </summary>
    /// <param name="milliseconds"></param>
	public static void Vibrate(long milliseconds)
	{
		#if UNITY_ANDROID && !UNITY_EDITOR
		vibrator.Call("vibrate", milliseconds);
		#endif
	}

    /// <summary>
    /// Vibración en base a un patron (pausa, tiempo activa, pausa, ...)
    /// </summary>
    /// <param name="pattern"></param>
    /// <param name="repeat"></param>
	public static void Vibrate(long[] pattern, int repeat)
	{
		#if UNITY_ANDROID && !UNITY_EDITOR
		vibrator.Call("vibrate", pattern, repeat);
		#endif
	}

    /// <summary>
    /// Detiene todas las vibraciones activas y acaba bucles
    /// </summary>
	public static void Cancel()
	{
		#if UNITY_ANDROID && !UNITY_EDITOR
		vibrator.Call("cancel");
		#endif
	}

    /// <summary>
    /// Vibracion custom que vibra vibrationDuration y espera maxWait entre vibraciones
    /// strength sirve para modular la espera, 0 con strength 1 y la maxima con strength 1
    /// </summary>
    /// <param name="strength"></param>
    /// <param name="vibrationDuration"></param>
    /// <param name="maxWait"></param>
    /// <param name="loop"></param>
    public static void SonarVibration(float strength, long vibrationDuration, long maxWait, bool loop ) {
        long[] pattern;
        int repeat = loop ? 0 : -1;
        if (strength < 0) strength = 0;
        else if (strength > 1) strength = 1;

        if (strength == 1) pattern = new long[2] { 0, vibrationDuration };

        else
        {
            pattern = new long[3] { 0, vibrationDuration, (long)(maxWait*(1-strength)) };
        }

        string s = "pattern ";
        foreach (long l in pattern)
        {
            s += l.ToString() + " ";
        }
        Debug.Log(s);

        Vibrate(pattern, repeat);
    }

    /// <summary>
    /// Método que indica si el dispositivo tiene motor de vibración
    /// </summary>
    /// <returns></returns>
	public static bool HasVibrator()
	{
#if UNITY_ANDROID && !UNITY_EDITOR
		AndroidJavaClass contextClass = new AndroidJavaClass("android.content.Context");
		string Context_VIBRATOR_SERVICE = contextClass.GetStatic<string>("VIBRATOR_SERVICE");
		AndroidJavaObject systemService = context.Call<AndroidJavaObject>("getSystemService", Context_VIBRATOR_SERVICE);
		if (systemService.Call<bool>("hasVibrator"))
		{
			return true;
		}
		else
		{
			return false;
		}
#else
		return false;
#endif
	}

    /// <summary>
    /// Vibración genérica que sirve para varios tipos de dispositivo movil.
    /// Vibra durante medio segundo.
    /// </summary>
	public static void Vibrate()
	{
		Handheld.Vibrate();
	}

}
