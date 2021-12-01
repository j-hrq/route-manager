<?php

require __DIR__.'/vendor/autoload.php';

use App\Http\Router;
use App\Http\Response;
use App\Controller\Pages\Home;

define('URL', 'http://127.0.0.1:8080/study/');
$obRouter = new Router(URL);
/*
echo '<pre>';
print_r($obRouter);
exit;
echo '</pre>';
*/

// rota HOME
$obRouter->get('/', [
    function()
    {
        return new Response('200', Home::getHome());
    }
    ]);

$obRouter->run()
         ->sendResponse();

