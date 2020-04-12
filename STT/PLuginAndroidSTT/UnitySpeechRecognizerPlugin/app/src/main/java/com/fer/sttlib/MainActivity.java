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
    private static final int REQ_CODE_SPEECH_INPUT = 100;
    private static String lang = "es-ES";
    private ArrayList<String> resultData = new ArrayList<>();


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
    }

    public void changeLang(String s) {
        this.lang = s;
    }

    public void StartListening() {
        Intent intent = new Intent(RecognizerIntent.ACTION_RECOGNIZE_SPEECH);
        intent.putExtra(RecognizerIntent.EXTRA_LANGUAGE_MODEL, RecognizerIntent.LANGUAGE_MODEL_FREE_FORM);
        intent.putExtra(RecognizerIntent.EXTRA_LANGUAGE, lang);
        intent.putExtra(RecognizerIntent.EXTRA_MAX_RESULTS, 0);
        try {
            this.startActivityForResult(intent, REQ_CODE_SPEECH_INPUT);
        } catch (ActivityNotFoundException a) {
            Log.d("ERROR", a.toString());
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == REQ_CODE_SPEECH_INPUT) {
            if (resultCode == RESULT_OK) {
                if (data != null) {
                    resultData = data.getStringArrayListExtra(RecognizerIntent.EXTRA_RESULTS);
                    String finalText =resultData.get(0);
                    Log.i("UnityTag", "AHORA SE DEBERIA ENVIAR EL PUTO MENSAJE");
                    UnityPlayer.UnitySendMessage("STTUnity", "OnResult", finalText);
                }
            }
        }

    }
}