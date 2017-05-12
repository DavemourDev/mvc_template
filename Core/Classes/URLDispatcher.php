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

    public function call()
    {
        $controllerName=ucfirst($this->controller).'Controller';
        $actionName=$this->action.'Action';
       //require_once self::CONTROLLER_DIRECTORY.$controllerName.self::CONTROLLER_EXTENSION;
        call_user_func_array([new $controllerName, $actionName], [$this->args]);
    }
    
}
