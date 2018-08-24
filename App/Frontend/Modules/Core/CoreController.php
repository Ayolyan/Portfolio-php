<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 23/08/2018
 * Time: 21:22
 */

namespace App\Frontend\Modules\Core;

use \AyolyanFram\BackController;
use \AyolyanFram\HTTPRequest;
use \NavBuilder\Nav;

class CoreController extends BackController {

    public function executeIndex(HTTPRequest $request) {
        $this->page->addVar('title', 'Yoan Bidet | Portfolio');

        $nav = new Nav('index');
        $this->page->addVar('leftNav', $nav->getLeftNav());
        $this->page->addVar('rightNav', $nav->getRightNav());
    }

    public function executeContact(HTTPRequest $request) {
        $this->page->addVar('title', 'Contact | Yoan Bidet');
    }

    public function executeProfile(HTTPRequest $request) {
        $this->page->addVar('title', 'Profil | Yoan Bidet');

        $nbCPItems = $this->app->getConfig()->get('nb_CPItems');
        // On récupère le manager des items du portrait chinois
        $manager = $this->managers->getManagerOf('CPItem');
        // On récupère les données des items
        $listCPItems = $manager->getList(0, $nbCPItems);
        // On ajoute la variable à la page pour la passer à la vue
        $this->page->addVar('listCPItems', $listCPItems);
    }

}