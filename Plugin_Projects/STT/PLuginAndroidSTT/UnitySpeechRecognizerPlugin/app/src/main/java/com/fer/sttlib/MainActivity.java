package com.fer.sttlib;

import android.content.ActivityNotFoundException;
import android.content.Intent;
import android.os.Bundle;
import android.speech.RecognizerIntent;
import android.util.Log;
import com.unity3d.player.UnityPlayer;
import com.unity3d.player.UnityPlayerActivity;

import java.util.ArrayList;


public class MainActivity extends UnityPlayerActivity {

    private static String lang = "es-ES";
    private ArrayList<String> result = new ArrayList<>();
    private static final int ActivityCode = 14;



    public void changeLang(String s) { this.lang = s;}

    public void StartListening() {
        Intent intent = new Intent(RecognizerIntent.ACTION_RECOGNIZE_SPEECH);
        intent.putExtra(RecognizerIntent.EXTRA_LANGUAGE_MODEL, RecognizerIntent.LANGUAGE_MODEL_FREE_FORM);
        intent.putExtra(RecognizerIntent.EXTRA_LANGUAGE, lang);
        intent.putExtra(RecognizerIntent.EXTRA_MAX_RESULTS, 0);
        try {
            this.startActivityForResult(intent, ActivityCode);
        } catch (ActivityNotFoundException a) {
            Log.d("ERROR", a.toString());
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == ActivityCode) {
            if (resultCode == RESULT_OK) {
                if (data != null) {
                    result = data.getStringArrayListExtra(RecognizerIntent.EXTRA_RESULTS);
                    String finalText =result.get(0);
                    UnityPlayer.UnitySendMessage("STTUnity", "OnResult", finalText);
                }
            }
        }

    }
    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
    }

}