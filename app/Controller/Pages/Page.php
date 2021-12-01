<?php

namespace App\Controller\Pages;
use App\Util\View;

class Page {
    /**
     * Método responsável por retornar a header da página.
     */
    private static function getHeader() {
        return view::render('pages/header');
    }

    /**
     * Método responsável por retornar o conteudo da página.
     * @return string 
     */ 
    public static function getPage($title, $content) {
        return View::render('pages/page', [
            'title'  => $title,
            'header' => self::getHeader(),
            'content' => $content,
            'footer' => self::getFooter()
        ]);
    }

    /**
     * Método responsável por retornar a footer da página.
     */
    private static function getFooter() {
        return view::render('pages/footer');
    }
}