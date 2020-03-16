////////////////////////////////////////////////////////////////////////////////
//  
// @author Benoît Freslon @benoitfreslon
// https://github.com/BenoitFreslon/Vibration 
// https://benoitfreslon.com
//
////////////////////////////////////////////////////////////////////////////////

using UnityEngine;
#if UNITY_IOS && !UNITY_EDITOR
using System.Collections;
using System.Runtime.InteropServices;
#endif

public static class Vibration
{
    private static int patternTimeUnit = 100;


#if UNITY_ANDROID && !UNITY_EDITOR
	public static AndroidJavaClass unityPlayer = new AndroidJavaClass("com.unity3d.player.UnityPlayer");
	public static AndroidJavaObject currentActivity = unityPlayer.GetStatic<AndroidJavaObject>("currentActivity");
	public static AndroidJavaObject vibrator =currentActivity.Call<AndroidJavaObject>("getSystemService", "vibrator");
	public static AndroidJavaObject context = currentActivity.Call<AndroidJavaObject>("getApplicationContext");
#endif

	public static void Vibrate(long milliseconds)
	{
		#if UNITY_ANDROID && !UNITY_EDITOR
		vibrator.Call("vibrate", milliseconds);
		#endif
	}

	public static void Vibrate(long[] pattern, int repeat)
	{
		#if UNITY_ANDROID && !UNITY_EDITOR
		vibrator.Call("vibrate", pattern, repeat);
		#endif
	}

	public static void Cancel()
	{
		#if UNITY_ANDROID && !UNITY_EDITOR
		vibrator.Call("cancel");
		#endif
	}

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

    public static void Vibrate(float strength, int repeat)
    {
        long[] pattern;
        if (strength < 0) strength = 0;
        else if (strength > 1) strength = 1;

        if (strength == 0) return;
        else if (strength == 1) pattern = new long[2] { 0, patternTimeUnit};

        else
        {
            pattern = new long[4] { 0, patternTimeUnit, (long)(patternTimeUnit*strength), (long)(patternTimeUnit*(1-strength))};
        }

        string s = "pattern ";
        foreach(long l in pattern)
        {
            s += l.ToString() + " ";
        }
        Debug.Log(s);

        Vibrate(pattern, repeat);
    }

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

	public static void Vibrate()
	{
		Handheld.Vibrate();
	}



    public static void SetTimeUnit(int i)
    {
        if (i > 0) patternTimeUnit = i;
        else Debug.Log("TimeUnit must be bigger than 0");
    }


}
