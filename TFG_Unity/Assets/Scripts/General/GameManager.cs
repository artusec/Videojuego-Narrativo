﻿using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using System.IO;

[System.Serializable]
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
    public List<element> invObjects;
    public List<element> sceneObjs;

    public int room = 0;


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

    public bool isSceneNew(int roomIndex)
    {
        return room != roomIndex;
    }

    public void changeScene(string sceneName)
    {
        //saveToTXT();
        SceneManager.LoadScene(sceneName);
    }

    public void setInvState(string s, int state)
    {
        int elem = searchInvByName(s);
        invObjects[elem] = new element(invObjects[elem].prefabName, state);
    }
    public void setScenState(string s, int state)
    {
        int elem = searchSceneByName(s);
        sceneObjs[elem] = new element(sceneObjs[elem].prefabName, state);
    }

    public int searchInvByName(string s)
    {
        int index = -1;
        int count = 0;

        foreach (element e in invObjects)
        {
            if (e.prefabName == s) { index = count; break; }
            count++;
        }
        return index;
    }

    public int searchSceneByName(string s)
    {
        int index = -1;
        int count = 0;

        foreach (element e in sceneObjs)
        {
            if (e.prefabName == s) { index = count; break; }
            count++;
        }
        return index;
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

    /// <summary>
    /// Añade objeto a inventario en default
    /// </summary>
    /// <param name="s"></param>
    public void addItemToInv(string s)
    {
        addItemToInv(s, 1);
    }

    /// <summary>
    /// Añade objeto a inventario en estado i
    /// </summary>
    /// <param name="s"></param>
    public void addItemToInv(string s, int i)
    {
        invObjects.Add(new element(s, i));
        SRManager srm = SRManager.instance;
        if (srm != null)
        {
            SRElement aux = Instantiate((Resources.Load("Objects/" + s)) as GameObject, srm.inventory.transform).GetComponent<SRElement>();
            aux.name = deleteCloneText(aux.name);
            aux.setState((objectState)i);
            srm.inventory.Push(aux);
        }
    }

    /// <summary>
    /// Añade objeto a escena en default
    /// </summary>
    /// <param name="s"></param>
    public void addItemToScene(string s)
    {
        addItemToScene(s, 1);
    }

    //Carga datos guardados en local
    public void loadLocalData()
    {
        // Aqui hay que meter un trycatch con carga default si no se encuentra
        try
        {
            string savePath = Path.Combine(Application.persistentDataPath, "SaveData");
            // Obtenemos las lineas separadas por fin de linea
            string[] lines = File.ReadAllText(savePath).Split('\n');
            /*// Guardamos numero de habitacion
            room = lines[0][0];*/
            string[] objectsRead = lines[1].Split(',');
            invObjects = new List<element>();
            if (objectsRead.Length > 1)
            {
                for (int i = 0; i < objectsRead.Length; i++)
                {
                    element elem = new element(objectsRead[i].Split(':')[0], (objectState)int.Parse(objectsRead[i].Split(':')[1]));
                    invObjects.Add(elem);
                }
            }
            string[] sceneRead = lines[2].Split(',');
            sceneObjs = new List<element>();
            if (sceneRead.Length > 1)
            {
                for (int i = 0; i < sceneRead.Length; i++)
                {
                    element elem = new element(sceneRead[i].Split(':')[0], (objectState)int.Parse(sceneRead[i].Split(':')[1]));
                    sceneObjs.Add(elem);
                }
            }
        }
        catch { loadRoomFromFile(room); }
    }

    public void loadRoomNumber()
    {
        if (false) { Debug.Log("load online"); }
        else loadLocalRoomNumber();
    }

    public void loadLocalRoomNumber()
    {
        try
        {
            string savePath = Path.Combine(Application.persistentDataPath, "SaveData");
            // nota: esta forma de obtener el int solo valdria de 0 a 9, no tenemos tantas habitaciones
            room = (int)char.GetNumericValue(File.ReadAllText(savePath)[0]);
        }
        catch {
            room = 1;
        }
    }

    /// <summary>
    /// Añade objeto a inventario en estado i
    /// </summary>
    /// <param name="s"></param>
    public void addItemToScene(string s, int i)
    {
        sceneObjs.Add(new element(s, i));
        SRManager srm = SRManager.instance;
        if (srm != null)
        {
            SRElement aux = Instantiate((Resources.Load("Objects/" + s)) as GameObject, srm.scene.transform).GetComponent<SRElement>();
            aux.name = deleteCloneText(aux.name);
            aux.setState((objectState)i);
            srm.scene.Push(aux);
        }
    }

    public void instantiateRoom()
    {
        SRManager srm = SRManager.instance;
        if (srm == null) Debug.Log("No se puede crear escena sin SRManager");

        else
        {
            GameObject aux;
            SRElement elAux;
            List<SRElement> invList = new List<SRElement>();
            int count = 0;
            foreach (element el in invObjects)
            {
                aux = Instantiate((Resources.Load("Objects/" + invObjects[count].prefabName)) as GameObject, srm.inventory.transform);
                aux.name = deleteCloneText(aux.name);
                elAux = aux.GetComponent<SRElement>();
                elAux.setState(invObjects[count].state);
                invList.Add(elAux);
                count++;
            }
            SRManager.instance.inventory.sreList = invList;

            List<SRElement> sceneList = new List<SRElement>();
            count = 0;
            foreach (element el in sceneObjs)
            {
                aux = Instantiate((Resources.Load("Objects/" + sceneObjs[count].prefabName)) as GameObject, srm.scene.transform);
                aux.name = deleteCloneText(aux.name);
                elAux = aux.GetComponent<SRElement>();
                elAux.setState(sceneObjs[count].state);
                sceneList.Add(elAux);
                count++;
            }
            SRManager.instance.scene.sreList = sceneList;
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
    public void saveToTXT()
    {
        // Abrimos el archivo o lo cremos si no existe
        string savePath = Path.Combine(Application.persistentDataPath, "SaveData");
        // String que contiene todo el texto
        string roomFileLines = "";
        // Guardamos número de habitación
        roomFileLines += room;
        roomFileLines += "\n";
        // Guardamos objetos de inventario si los hay
        if (invObjects.Count > 0)
        {
            foreach (element el in invObjects)
            {
                //Guardado en TXT
                roomFileLines += el.prefabName + ":" + (int)el.state + ",";
            }
            roomFileLines = roomFileLines.Remove(roomFileLines.Length - 1);
        }
        roomFileLines += "\n";
        // Guardamos objetos de escena si los hay
        if (sceneObjs.Count > 0)
        {
            foreach (element el in sceneObjs)
            {
                //Guardado en TXT
                roomFileLines += el.prefabName + ":" + (int)el.state + ",";
            }
            roomFileLines = roomFileLines.Remove(roomFileLines.Length - 1);
        }
        // Escribimos en el archivo
        File.WriteAllText(savePath, roomFileLines);
    }
    public void saveToGMFromSRM()
    {
        SRManager srm = SRManager.instance;
        if (srm == null) Debug.Log("no hay srm de la que guardar");
        else
        {
            List<SRElement> objs = srm.inventory.sreList;
            List<SRElement> scen = srm.scene.sreList;

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
    }

    /// <summary>
    /// Carga la habitacion desde el archivo txt, rellena sceneObjs con los objetos en el archivo
    /// </summary>
    /// <param name="roomN"></param>
    public void loadRoomFromFile(int roomN)
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
                    sceneObjs.Add(new element(o.Replace('\r'.ToString(), ""), 1));
                }
                found = true;
            }
            lineIndex++;
        }
        room = roomN;
    }

    /// <summary>
    /// Devuelve un string con los objetos codificados para enviarlos al servidor
    /// </summary>
    /// <returns></returns>
    public void objectsToWebString()
    {
        // Objeto inicial con numero de habitacion
        string s = "RoomNumber-" + room.ToString() + ":0,";

        if (sceneObjs.Count > 0)
        {
            foreach (element e in sceneObjs)
            {
                s += e.prefabName + '-' + ((int)e.state).ToString() + ':' + '0' + ',';
            }
        }

        if (invObjects.Count > 0)
        {
            foreach (element e in invObjects)
            {
                s += e.prefabName + '-' + ((int)e.state).ToString() + ':' + '1' + ',';
            }
        }

        s = s.Remove(s.Length-1);

        Debug.Log(s);
    }

    public void updateGMFromWebString()
    {
        string test = "RoomNumber-2:0,LlaveOxidada1-1:0,Bomb-2:0,LlaveOxidada1-2:0,Bomb-0:1";

        sceneObjs = new List<element>();
        invObjects = new List<element>();

        //Separamos por objetos
        foreach(string s in test.Split(','))
        {
            // string[] con {Name-State,Type}
            string[] aux1 = s.Split(':');
            // string[] con {Name,State}
            string[] aux2 = aux1[0].Split('-');

            string name = aux2[0];
            int state = (int)char.GetNumericValue(aux2[1][0]);

            // Escena
            if (aux1[1] == "0")
            {
                // Número de habitacion
                if (name=="RoomNumber")
                {
                    room = state;
                }
                // Objeto de escena
                else
                {
                    sceneObjs.Add(new element(name, state));
                }
                
            }
            // Inventario
            else
            {
                invObjects.Add(new element(name, state));
            }
        }
    }
}
