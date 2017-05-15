<?php

/**
 * Representa a una entidad de la aplicación
 *
 * @author David
 */
abstract class Entity implements Crud{

    protected static $fieldSet=[];
    protected $fields=[];
    
    /**
     * Devuelve el valor de un campo de la instancia de entidad.
     * @param string $name Nombre del campo a obtener.
     * @return mixed Valor del campo del objeto entidad. Si el campo no contiene valor, devuelve null.
     * @throws Exception Si el campo no existe en la entidad.
     */
    public function __get($name)
    {
        if($this->fieldExists($name))
        {
            return isset($this->fields[$name]) ? $this->fields[$name] : null;
        }
        else
        {
            throw new Exception("La entidad '".__CLASS__."' no posee ningún campo llamado '".$name."'.");
        }
    }
    
    /**
     * Fija un valor para un campo de una instancia de entidad.
     * @param type $name
     * @param type $value
     * @throws Exception
     */
    public function __set($name, $value)
    {
        if($this->fieldExists($name))
        {
            $this->fields[$name]=$value;
        }
        else
        {
            throw new Exception("La entidad '".__CLASS__."' no posee ningún campo llamado '".$name."'.");
        }
    }
    
    /**
     * Comprueba si la entidad contiene un campo con el nombre solicitado.
     * @param string $field
     * @return boolean Devuelve true si el campo existe en la entidad.
     */
    protected function fieldExists($field)
    {
        return in_array($field, self::$fieldSet);
    }
    
    /**
     * Comprueba si una instancia de entidad contiene un campo con el nombre solicitado.
     * @param Entity $entity Instancia de entidad a comprobar. Puede ser cualquier objeto clasificable como entidad.
     * @param string $field Nombre dle campo a comprobar.
     * @return boolean Devuelve true si la instancia de entidad contiene el campo solicitado.
     */
    public final function entityHasField(Entity $entity, $field)
    {
        return $entity->fieldExists($field);
    }
    
   
    
    
}
