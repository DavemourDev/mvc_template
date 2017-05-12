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
function url_dispatcher($url = '')
{
    $url = isset($_GET['path']) ? $_GET['path'] : '';

    $urlArray = explode('/', $url);
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

function act() 
{
    url_dispatcher()->call();
}

/**
 * Incluye un archivo si éste existe.
 * @param type $filename Ruta del archivo.
 * @return boolean Si el archivo ha podido incluirse, devuelve true. En caso contrario, devuelve false.
 */
function include_if_exists($filename) 
{
    if (file_exists($filename)) {
        //debug($filename);
        include_once($filename);
        return true;
    }
    return false;
}

function not_contains_point($str)
{
    return !strstr($str, '.');
}