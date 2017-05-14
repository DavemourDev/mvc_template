<?php

/**
 * Posee los métodos abstractos básicos de un CRUD.
 * @author David
 */
interface Crud {
    
    public abstract function create();
    
    public abstract function getAll();
    
    public abstract function getById($id);
    
    public abstract function update($id);
    
    public abstract function delete($id);
    
}
