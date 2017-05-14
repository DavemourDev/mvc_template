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
    
    public function errorAction()
    {
        render_view('templates/error', [
            'error_heading'=>'Error de prueba',
            'error_body'=>'Este error ha sido lanzado para ver cómo queda en la vista de error.',
            'error_footer'=>'Más info del error o contacto',
            ]);
    }
    
}
