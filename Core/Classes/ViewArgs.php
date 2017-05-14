<?php

/**
 * Contenedor de los argumentos enviados a través de una acción a una vista.
 *
 * @author David
 */
abstract class ViewArgs {
    
    private static $args=[];
    
    /**
     * Recibe el valor de un argumento pasado a través de un controlador a una vista.
     * @param string $key Clave del atributo.
     * @return mixed Valor del atributo solicitado. Si no se ha establecido, devuelve null.
     */
    public static function get($key)
    {
        return isset(self::$args[$key]) ? self::$args[$key] : null;
    }
    
    /**
     * Fija un argumento de vista con un valor.
     * @param type $key Clave introducida.
     * @param type $value Valor introducido.
     * @return type Devuelve true si se ha podido insertar valor a la clave.
     * Si la clave está restringida, devolverá false.
     */
    public static function set($key, $value)
    {
        self::$args[$key]=$value;
        return boolval(!is_null(self::get($key)));
    }
 
    public static function getArgs()
    {
        return self::$args;
    }
    
}
