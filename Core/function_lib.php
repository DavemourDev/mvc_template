<?php

include_once 'autoload.php';

/**
 * Debuggea todos los elementos pasados como argumento.
 */
function debug() 
{
    echo "<pre class='debug'>";
    echo "<h2>Debug:</h2>";
    foreach (func_get_args() as $arg) {
        var_dump($arg);
    }
    echo "</pre>";
}

/**
 * Crea un objeto URLDispatcher utilizando la URL introducida.
 * @param string $url URL que sigue a la base.
 * @return URLDispatcher
 */
function url_dispatcher()
{
    $urlArray = explode('/', isset($_GET['path'])?$_GET['path']:'');
    $controller = !empty($urlArray[0]) ? $urlArray[0] : '';
    $action = !empty($urlArray[1]) ? $urlArray[1] : '';
    $args = array_slice($urlArray, 2);

    return new URLDispatcher($controller, $action, $args);
}

/**
 * Renderiza la vista solicitada.
 * @param string $view URL relativa al directorio de vistas del archivo solicitado(sin extensión).
 * @param Array[k=>v] $args Argumentos enviados a la vista.
 */
function render_view($view, $args = []) 
{
    (new ViewRenderer())->render($view, $args);
}

function template($template=null)
{
    
    if(is_null($template))
    {
        $template=viewArg('_template');
    }
    return (new ViewRenderer)->add_template($template);
}

/**
 * Llama al controlador y la acción definidos por la ruta
 */
function call_to_action()
    {
        $url=url_dispatcher();
        $controllerName=ucfirst($url->getController()).'Controller';
        //$actionName=$url->getAction().'Action';
        $actionName=$url->getAction();
        //call_user_func_array([new $controllerName, $actionName], [$url->getArgs()]);
        (new $controllerName)->$actionName($url->getArgs());
    }

/**
 * Incluye un archivo si éste existe.
 * @param type $filename Ruta del archivo.
 * @return boolean Si el archivo ha podido incluirse, devuelve true. En caso contrario, devuelve false.
 */
function include_if_exists($filename) 
{
    if ($exists = file_exists($filename)) 
    {
        include($filename);
    }
    return $exists;
}

/**
 * Comprueba si una cadena de texto no contiene puntos.
 * @param string $str Cadena de texto de entrada.
 * @return boolean Devuelve true si la cadena introducida no contiene el caracter '.'
 */
function not_contains_point($str)
{
    return !strstr($str, '.');
}

/**
 * Devuelve un argumento de la vista o fija un argumento a la vista.
 */
function viewArg($key, $value=null)
{
    if(is_null($value))
    {
        //Si value es nulo, devuelve el valor de la clave guardada.
        return ViewArgs::get($key);
    }
    else
    {
        //si value no es nulo, asigna el valor a la clave indicada.
        return ViewArgs::set($key, $value);
    }
}

/**
 * Obtiene un array con la configuración de la aplicación.
 * @param string $key Clave de la parte que quiere obtenerse
 * @return array Devuelve un array con la configuración global de la aplicación o con una sección de la misma.
 */
function get_config($key = null)
{
    $config= json_decode(file_get_contents(__DIR__.'/config.json'), true);
    
    return $key ? $config[$key] : $config;
    
}