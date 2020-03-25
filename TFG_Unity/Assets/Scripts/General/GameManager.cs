using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public enum objectState {DESTROYED, DEFAULT, USED};
public class GameManager : MonoBehaviour
{
    [System.Serializable]
    public struct element
    {
        public string prefabName;
        public objectState state;
        public element(string s, objectState o) { prefabName = s; state = o; }
        public element(string s, int o) { prefabName = s; state = (objectState)o; }
    }

    public static GameManager instance;
    public int levelPassed = 1;
    public List<element> invObjects;
    public List<element> sceneObjs;


    // Start is called before the first frame update
    void Awake()
    {
        if (GameManager.instance == null)
        {
            instance = this;
            DontDestroyOnLoad(gameObject);
        }

        else Destroy(gameObject);
    }

    private void Start()
    {
    }

    // Update is called once per frame
    void Update()
    {

    }

    public void changeScene(string sceneName)
    {
        SceneManager.LoadScene(sceneName);
    }
    /*public SRList getObjects()
    {
        return objects;
    }
    public void setObjects(SRList objs, SRList scen)
    {
        objects = objs;
        sceneObjs = scen;
    }
    */
    public void loadState()
    {
        GameObject aux;
        SRElement elAux;
        int count = 0;
        foreach (element el in invObjects)
        {
            aux = Instantiate((Resources.Load("Pruebas/" + invObjects[count].prefabName)) as GameObject);
            aux.name = deleteCloneText(aux.name);
            elAux = aux.GetComponent<SRElement>();
            elAux.setState(invObjects[count].state);
            count++;
        }
        count = 0;
        foreach (element el in sceneObjs)
        {
            aux = Instantiate((Resources.Load("Pruebas/" + sceneObjs[count].prefabName)) as GameObject);
            aux.name = deleteCloneText(aux.name);
            elAux = aux.GetComponent<SRElement>();
            elAux.setState(sceneObjs[count].state);
            count++;
        }
    }

    //Delete (Clone) name for instanced objects
    string deleteCloneText(string objectText)
    {
        if (objectText[objectText.Length - 1] == ')')
        {
            objectText = objectText.Substring(0, objectText.Length-7);
        }
        return objectText;
    }
    public void saveState()
    {
        List<SRElement> objs = SRManager.instance.inventory.sreList;
        List<SRElement> scen = SRManager.instance.scene.sreList;

        List<element> objStates = new List<element>();
        List<element> scenStates = new List<element>();

        int count = 0;
        element aux;
        foreach (SRElement el in objs)
        {
            aux.prefabName = el.gameObject.name;
            aux.state = el.getState();
            objStates.Add(aux);
            count++;
        }
        count = 0;
        foreach (SRElement el in scen)
        {
            aux.prefabName = el.gameObject.name;
            aux.state = el.getState();
            scenStates.Add(aux);
            count++;
        }

        invObjects = objStates;
        sceneObjs = scenStates;
    }

    /// <summary>
    /// Carga la habitacion desde el archivo txt, rellena sceneObjs con los objetos en el archivo
    /// </summary>
    /// <param name="roomN"></param>
    private void loadRoomFromFile(int roomN)
    {
        string filePath = "Rooms"; //ruta archivo

        string[] roomFileLines = Resources.Load<TextAsset>(filePath).text.Split('\n');
        bool found = false;
        int lineIndex = 0;
        // Buscamos el index del nivel
        while (!found && lineIndex < roomFileLines.Length) // No hemos encontrado y no es el final
        {
            var aux = roomFileLines[lineIndex].Split(':');
            if (aux[0] == roomN.ToString())
            {
                sceneObjs.Clear();
                foreach(string o in aux[1].Split(','))
                {
                    sceneObjs.Add(new element(o, 1));
                }
                found = true;
            }
            lineIndex++;
        }
    }
}
