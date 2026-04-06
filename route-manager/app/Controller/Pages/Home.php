<?php

namespace App\Controller\Pages;

use \App\Util\View;
use \App\Controller\Pages\Page;
use \App\Models\Entity\Organization;

class Home extends Page {

    public static function getHome() {

        $obOrganization = new Organization;

        $content = View::render('pages/home', [
            'name'  => $obOrganization->name,
            'site'  => $obOrganization->site,
            'about' => $obOrganization->about
        ]);

        return parent::getPage('Home', $content);
    }

}