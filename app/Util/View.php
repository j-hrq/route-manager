<?php
namespace App\Util;

class View {
    
    /**
     * Método responsável por retornar o conteúdo de uma view.
     * @param string $view
     * @return string
     */
    private static function getContentView($view) {
        
        $file = __DIR__.'./../../resources/view/'. $view .'.html';
        return file_exists($file) ? file_get_contents($file) : '';

    }
    /**
     * Método responsável por retornar o conteúdo RENDERIZADO de uma view.
     * @param string $view
     * @return string
     */ 
    public static function render($view, $vars = []){
        
        // CONTEÚDO DA VIEW
        $contentView = self::getContentView($view);
        
        //CHAVES DA ARRAY
        $keys = array_keys($vars);
        $keys = array_map ( function($item) { 
            return '{{'.$item.'}}';
        }, $keys);

        //RETORNO DO CONTEÚDO RENDERIZADO: (chaves da array, conteúdos da array, getContentView())
        return str_replace($keys, array_values($vars), $contentView);

    }
}