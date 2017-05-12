<?php

/**
 * Controlador Main
 *
 * @author David
 */
class MainController extends Controller
{

    public function homeAction($args)
    {
        render_view('templates/home', $args);
    }
    
}
