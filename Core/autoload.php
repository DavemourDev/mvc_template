<?php

spl_autoload_register(function($classname) 
{
    
    $dir=str_replace('\\','/',__DIR__).'/Classes/';
    
    $filename = $dir.$classname.".php";
    
    if(!include_if_exists($filename))
    {
        foreach(array_filter(scandir($dir), 'not_contains_point') as $d)
        {
            if(include_if_exists($filename=$dir.$d.'/'.$classname.'.php'))
            {
                //Una vez incluido el archivo, no es necesario seguir con esta farsa.
                return;
            }
            
        }
        //En un futuro se puede hacer recursivo a ver qué pasa
    }
    
}, true, true);



