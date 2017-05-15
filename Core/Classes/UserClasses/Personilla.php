<?php

class Personilla 
{
    private $nombre, $edad, $profesion;
    
    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function setNombre($nombre)
    {
        $this->nombre=$nombre;
    }
    
    public function getEdad()
    {
        return $this->edad;
    }
    
    public function setEdad($edad)
    {
        $this->edad=$edad;
    }
    
    public function getProfesion()
    {
        return $this->profesion;
    }
    
    public function setProfesion($profesion) 
    {
        $this->profesion=$profesion;
    }
    
}
