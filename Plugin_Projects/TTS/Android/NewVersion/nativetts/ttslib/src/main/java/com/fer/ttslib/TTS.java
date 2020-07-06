package com.fer.ttslib;

import android.content.Context;
import android.speech.tts.TextToSpeech;
import android.util.Log;


import java.util.Locale;

public class TTS {
    private TextToSpeech T;
    private static TTS TextToSpeech;
    private Locale l = new Locale("es", "ES");
    private String text;
    private Context context;
    private float V = 1f;

    public TTS(){
        this.TextToSpeech = this;
    }

    public void setContext(Context c){
        this.context = c;
    }
    public static TTS getInstance(){
        if(TextToSpeech == null){
            TextToSpeech = new TTS();
        }
        return TextToSpeech;
    }

    public void changeLang(String lang){
        Log.e("1",lang);
        if(lang.equals("ES")){
            l = new Locale("es", "ES");
        }
        else {
            l = Locale.UK;
        }
        if(T!=null)
            T.setLanguage(l);
    }

    public void changeSpeed(String n){
        if(n.equals("Normal"))
            V = 1f;
        else if(n.equals("Fast"))
            V=1.5f;
        else if(n.equals("Slow"))
            V=0.5f;
        if(T!=null)
            T.setSpeechRate(V);
    }

    public  void Speak(String s){
        text = s;
        T = new TextToSpeech(context, new TextToSpeech.OnInitListener() {
            public void onInit(int status) {
                if (status == android.speech.tts.TextToSpeech.SUCCESS) {
                    T.setLanguage(l);
                    T.setSpeechRate(V);
                    T.speak(text,T.QUEUE_FLUSH,null);

                } else {
                    Log.e("1","Error de TTS");
                }
            }
        });
    }
}