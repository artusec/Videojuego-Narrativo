<?php
require_once __DIR__ . '/Aplication.php';


class Object
{
    private $id;
    private $name;
    private $description;
    private $room;


    private function __construct($array)
    {
        $this->name= $array['name'];
        $this->description = $array['description'];
        $this->room = $array['room'];
    }


    




    

    /* Getters and Setters -------------------------------------------------------------------*/

    public function getId()
    {
        return $this->id;
    }


    public function getName()
    {
        return $this->name;
    }


    public function getDescription()
    {
        return $this->description;
    }

     public function getRoom()
    {
        return $this->room;
    }
}
