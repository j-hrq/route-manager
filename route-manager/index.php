<?php

require __DIR__.'/vendor/autoload.php';

use App\Http\Router;
use App\Util\View;

define('URL', 'http://localhost:8000/route-manager');

View::init([
    'URL' => URL
]);

$obRouter = new Router(URL);

include __DIR__.'/routes/pages.php';

$obRouter->run()
         ->sendResponse();