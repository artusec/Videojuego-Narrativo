using UnityEngine;
using UnityEngine.UI;
using static STT;

public class Test : MonoBehaviour
{
    Button B;

    void Start()
    {
        B = GameObject.Find("Button").GetComponent<Button>();
        B.onClick.AddListener(StartListening);
    }

    private void StartListening()
    {
        Debug.Log("Listen");
        Listen();
    }

}

 
