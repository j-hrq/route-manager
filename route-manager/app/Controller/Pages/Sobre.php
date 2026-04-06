<?php

namespace App\Controller\Pages;

use \App\Util\View;
use \App\Controller\Pages\Page;
use \App\Models\Entity\Organization;

class Sobre extends Page {

    public static function getSobre() {

        $obOrganization = new Organization;

        $content = View::render('pages/sobre', [
            'name'  => $obOrganization->name
        ]);

        return parent::getPage('Sobre', $content);
    }

}