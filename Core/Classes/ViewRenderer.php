<?php

/**
 * Maneja el renderizado y otras configuraciones de vistas.
 * @author David
 */
class ViewRenderer 
{
    const VIEW_DIRECTORY='app/view/';
    const EXTENSION='.view.php';
    
    private $base;
    
    public function __construct($base='base')
    {
        $this->base=$base;
    }
    
    public function render($view, $args=[])
    {
        $_template=$view.self::EXTENSION;
        include_once self::VIEW_DIRECTORY.$this->base.self::EXTENSION;
    }
    
}
