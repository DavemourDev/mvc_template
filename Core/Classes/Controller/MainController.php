<?php

/**
 * Controlador Main
 *
 * @author David
 */
class MainController extends Controller
{

    protected function homeAction()
    {
        render_view('templates/home');
    }
    
    protected function listAction()
    {
        viewArg('MiNombre', 'David');
        render_view('templates/list');
    }
    
    protected function personillaAction()
    {
        $personilla=new Personilla;
        $personilla->setNombre(viewArg(0));
        $personilla->setEdad(viewArg(1));
        
        viewArg('personilla', $personilla);
        
        render_view('templates/personilla');
    }
    
}
