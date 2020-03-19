using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class GameManager : MonoBehaviour
{
    public static GameManager instance;

    List<SRElement> objects;


    // Start is called before the first frame update
    void Start()
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
    public List<SRElement> getObjects()
    {
        return objects;
    }
    public void setObjects(List<SRElement> objs)
    {
        objects = objs;
    }
    public void saveState(int[] states)
    {
        if (states.Length <= objects.Count)
        {
            int count = 0;
            foreach (SRElement elem in objects)
            {
                elem.setState(states[count]);
                count++;
            }
        }
        else print("¡NO COINCIDEN LOS ELEMENTOS!");
    }
}
