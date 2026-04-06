<?php

use \App\Http\Response;
use \App\Controller\Pages;

// rota HOME
$obRouter->get('/', [
    function()
    {
        return new Response('200', Pages\Home::getHome());
    }
    ]);

$obRouter->get('/sobre', [
    function()
    {
        return new Response('200', Pages\Sobre::getSobre());
    }
    ]);

$obRouter->get('/blog/{idPagina}', 
    function($idPagina)
    {
        return new Response('200', 'Página '.$idPagina);
    }
    );