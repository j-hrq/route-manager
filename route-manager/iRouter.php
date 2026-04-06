<?php
//Utilizado apenas enquanto não for utilizado o apache


// Se o arquivo físico existir, serve normalmente (css, js, imagens)
if (file_exists(__DIR__ . $_SERVER['REQUEST_URI'])) {
    return false;
}

// Caso contrário, redireciona tudo para o index.php
require __DIR__ . '/index.php';