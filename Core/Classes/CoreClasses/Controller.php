<?php

/**
 * @author David
 */
class Controller 
{
    /**
     * Llama una acción del controlador. Si la acción no existe, llama a la acción Error.
     * @param type $name
     * @param type $args
     */
    public function __call($name, $args)
    {
        if(method_exists($this, $name.'Action'))
        {
            foreach($args[0] as $k=>$v)
            {
                viewArg($k, $v);
            }
            
            return $this->{$name.'Action'}();
        }
        else
        {
            return $this->errorAction(['error_message'=>"Acción desconocida: '$name'"]);
        }
    }
    
    /**
     * Acción llamada en caso de error.
     * @param type $args
     */
    protected function errorAction($args)
    {
        render_view('templates/error', $args);
    }
    
    
}
