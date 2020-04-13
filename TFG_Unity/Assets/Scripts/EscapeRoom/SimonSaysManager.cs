using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

[System.Serializable]
public enum SimonPoints
{
    Left,
    Centre,
    Right
}

public class SimonSaysManager : MonoBehaviour
{
    [Header("Propiedades del juego")]
    [Tooltip("Si se activa, el path se generará de manera automática")]
    public bool randomPath = false;
    [Tooltip("Número de pasos que se generarán si la opción de randomizar el juego se encuentra activa. \n Si la opción se " +
        "encuentra desactivada, este número se fijará automáticamente al tamaño de la lista path")]
    public int pathLenght;
    //auxiliar que irá desde 0 hasta pathLenght, aumentando en 1 cada nivel
    private int actualSteps;
    [Tooltip("La lista de pasos que recorrerá el simon says")]
    [SerializeField]
    public List<SimonPoints> path;
    [Tooltip("El tiempo que pasa desde que deja de sonar un sonido hasta que empieza el siguiente")]
    public float timeBetweenPoints = 0.5f;

    [Space(10)]

    [Header("propiedades del audio")]
    [Tooltip("el audio que se reproducirá")]
    public AudioSource src;
    public AudioSource ttsSource;
    public AudioClip []simonClips;
    [Tooltip("El sonido cuando el player se equivoca")]
    public AudioSource looseAudio;
    [Tooltip("Las posiciones desde dónde se reproducirá el audio. \n Si se diseña el path manualmente conviene poner los puntos" +
        "en el orden de las opciones posibles de path")]
    [SerializeField]
    public List<Transform> points;

    //propiedades del player

    private move lastRegistered;
    //turno de reproducir sonidos o turno de recoger el input del jugador
    private bool playerTurn = false;
    //auxiliar para saber en qué momento de selección está el player
    private int playerIndex = 0;

    //propiedades de interfaz

    public Text part1Text;
    public Text part2Text;

    //para asegurarnos de valores permitidos
    private void OnValidate()
    {
        //si activamos el randomizador
        if (randomPath)
        {
            //marcamos para que sea editable el numero de pasos que se generaran automaticamente
            if (pathLenght < 0)
                pathLenght = 0;
            //y limpiamos la lista 
            while(path.Count > 0)
            {
                path.RemoveAt(path.Count - 1);
            }
        }
        else
        {
            if (pathLenght != path.Count)
                pathLenght = path.Count;
        }
        //el número de opciones posibles del enum
        int aux = System.Enum.GetValues(typeof(SimonPoints)).Length;
        //aseguramos que haya salidas de audio igual a opciones del 
        if(points.Count != aux)
        {
            while(points.Count < aux)
            {
                points.Add(null);
            }
            while(points.Count > aux)
            {
                points.RemoveAt(points.Count - 1);
            }
        }
        //aseguramos que el tiempo entre sonidos es válido
        if (timeBetweenPoints < 0)
            timeBetweenPoints = 0;
    }

    // Start is called before the first frame update
    void Start()
    {
        if (randomPath)
        {
            //creamos la lista
            for (int i = 0; i < pathLenght; i++)
                //random entre 0 y el número de opciones dentro del enum SimonPoints
                path.Add((SimonPoints)Random.Range(0, System.Enum.GetValues(typeof(SimonPoints)).Length));
        }
        //marcamos que, al iniciar, se empieza con un sólo sonido de la secuencia
        actualSteps = 1;

        OnStart();
    }

    private void OnStart()
    {
        //hacer cosos de inicio parro aqui 
        //  a este metodo se le llama al final del metodo Start
        ttsSource.Play();

        //empieza el juego en el tiempo que le digas
        Invoke("StartGame", ttsSource.clip.length+0.5f);
    }
    //arranca con la logica del juego
    private void StartGame()
    {
        if (!part1Text.gameObject.activeInHierarchy)
            part1Text.gameObject.SetActive(true);
        if (part2Text.gameObject.activeInHierarchy)
            part2Text.gameObject.SetActive(false);

        StartCoroutine(playSimon());
    }

    IEnumerator playSimon()
    {
        while(playerIndex < actualSteps)
        {
            //ajustamos el audio y lo reproducimos
            //src.loop = false;
            src.transform.position = points[(int)path[playerIndex]].position;
            src.clip = simonClips[(int)path[playerIndex]];
            src.Play();
            //float algo = src.clip.length;
            playerIndex++;
            //esperamos el tiempo indicado + la duración del propio audio
            yield return new WaitForSeconds(timeBetweenPoints + src.clip.length);
        }
        //mostrar audios de explicación aquí o al empezar ¿?
        playerTurn = true;
        playerIndex = 0;

        if (part1Text.gameObject.activeInHierarchy)
            part1Text.gameObject.SetActive(false);
        if (!part2Text.gameObject.activeInHierarchy)
            part2Text.gameObject.SetActive(true);
    }

    // Update is called once per frame
    void Update()
    {
        if (playerTurn)
            //solo nos interesa recoger el input si estamos en la parte de reproducir la secuencia
            GetPlayerInput();
    }

    private void GetPlayerInput()
    {
        //auxiliar para saber si hemos registrado uno de los movimientos que queremos
        bool inputRegistered = false;
        switch (ScreenInput.instance.getInput())
        {
            //si se quiere mostrar por audio el movimiento hecho por el player habría que
            //  meterlo en cada caso con el movimiento correspondiente
            case move.left:
                lastRegistered = move.left;
                inputRegistered = true;
                print("izq");
                break;
            case move.right:
                lastRegistered = move.right;
                inputRegistered = true;
                print("der");
                break;
            case move.up:
                lastRegistered = move.up;
                inputRegistered = true;
                print("up");
                break;
            default: break;
        }
        if (inputRegistered)
        {
            checkCorrectInput();
        }
    }

    private void checkCorrectInput()
    {
        //si coincide con el input deseado
        if (lastRegistered == move.left && path[playerIndex] == SimonPoints.Left ||
            (lastRegistered == move.up || lastRegistered == move.down) && path[playerIndex] == SimonPoints.Centre ||
            lastRegistered == move.right && path[playerIndex] == SimonPoints.Right)
        {
            print("Adecuado");
            src.transform.position = points[(int)path[playerIndex]].position;
            src.clip = simonClips[(int)path[playerIndex]];
            src.Play();
            playerIndex++;
            //siguiente nivel
            if(playerIndex >= actualSteps)
            {
                //ajuste de variables
                playerTurn = false;
                playerIndex = 0;
                actualSteps++;
                //si todavia quedan niveles por jugar
                // menor o igual porque actualSteps empieza en 1 y no en 0
                if(actualSteps <= path.Count)
                {
                    Invoke("StartGame", + src.clip.length+ 1f);
                }
                //si no, hemos ganado
                else
                {
                    print("victoria");
                    Invoke("OnWin", 0f);
                }
            }
        }
        //si el input es erroneo
        else
        {
            print("fallo, vuelve a poner la secuencia completa");
            playerTurn = false;
            playerIndex = 0;
            looseAudio.Play();
            //reseteamos el nivel
            Invoke("StartGame", 0.5f + looseAudio.clip.length);
        }
    }

    private void OnWin()
    {
        //mas cosas de parro aqui
        //a este metodo ya se le llama justo desde el metodo de arriba, 
        //  que posee la condicion de victoria
        GameManager.instance.changeScene("Ending");
    }
}
