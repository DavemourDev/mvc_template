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
    
    /**
     * Renderiza una vista.
     * @param type $view
     * @param type $args
     */
    public function render($view, $args=[])
    {
        foreach($args as $k=>$v)
        {
            viewArg($k, $v);
        }
        
        viewArg('_template', $view.self::EXTENSION);
        
        include_once self::VIEW_DIRECTORY.$this->base.self::EXTENSION;
    }
    
    /**
     * Añade una plantilla a una vista.
     * @param string $template URL relativa de la plantilla.
     * @return boolean Devuelve true si ha podido encontrarse la plantilla y añadirse.
     */
    public function add_template($template)
    {
        return include_if_exists(self::VIEW_DIRECTORY.$template);
    }
    
}
