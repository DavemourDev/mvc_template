<?php

/**
 * 
 * @author David
 */
class URLDispatcher 
{

    const CONTROLLER_DIRECTORY='controller/';
    const CONTROLLER_EXTENSION='.php';
    
    private $controller = 'main';
    private $action = 'home';
    private $args = [];

    function __construct($controller = 'main', $action = 'home', $args = []) 
    {
        $this->controller = $controller?$controller:'main';

        $this->action = $action?$action:'home';

        $this->args = $args;
    }
    
    public function getController()
    {
        return $this->controller;
    }
    
    public function getAction()
    {
        return $this->action;
    }
    
    public function setController($controller)
    {
        $this->controller=$controller;
    }
    
    public function setAction($action)
    {
        $this->action=$action;
    }

    public function getArgs()
    {
        return $this->args;
    }
    
    public function setArg($key, $value)
    {
        $this->args[$key]=$value;
    }
    
    public function getArg($key)
    {
        return $this->args[$key];
    }
    
    public function deleteArg($key)
    {
        unset($this->args[$key]);
    }
}
