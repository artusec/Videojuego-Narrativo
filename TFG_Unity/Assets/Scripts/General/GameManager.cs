using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class GameManager : MonoBehaviour
{
    public static GameManager instance;
    public int levelPassed = 1;
    int[] objects;
    int[] sceneObjs;


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
    public int loadSceneObj(int i)
    {
        /*List<SRElement> aux = new List<SRElement>();
        foreach (SRElement elem in objects.sreList)
        {
            aux.Add(elem);
        }
        return aux;
        */
        return sceneObjs[i];
    }
    public int loadInventoryObj(int i)
    {
        /*List<SRElement> aux = new List<SRElement>();
        foreach (SRElement elem in sceneObjs.sreList)
        {
            aux.Add(elem);
        }
        return aux;
        */
        return objects[i];
    }
    public void saveState(SRList objs, SRList scen)
    {
        /*if (objStates.Length <= objects.sreList.Count)
        {
            int count = 0;
            foreach (SRElement elem in objects.sreList)
            {
                elem.setState(objStates[count]);
                count++;
            }
        }
        else print("¡NO COINCIDEN LOS ELEMENTOS!");
        if (scenStates.Length <= sceneObjs.sreList.Count)
        {
            int count = 0;
            foreach (SRElement elem in sceneObjs.sreList)
            {
                elem.setState(scenStates[count]);
                count++;
            }
        }
        else print("¡NO COINCIDEN LOS ELEMENTOS!");
        */
        int[] objStates = new int[objs.sreList.Count];
        int[] scenStates = new int[scen.sreList.Count];

        int count = 0;
        foreach (SRElement el in objs.sreList)
        {
            objStates[count] = el.getState();
            count++;
        }
        count = 0;
        foreach (SRElement el in scen.sreList)
        {
            scenStates[count] = el.getState();
            count++;
        }

        objects = objStates;
        sceneObjs = scenStates;
    }
}
