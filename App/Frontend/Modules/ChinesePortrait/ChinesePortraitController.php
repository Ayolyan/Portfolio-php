<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 20/08/2018
 * Time: 16:05
 */

namespace App\Frontend\Modules\ChinesePortrait;

use \AyolyanFram\BackController;
use \AyolyanFram\HTTPRequest;
use \NavBuilder\Nav;

class ChinesePortraitController extends BackController {

    public function executeIndex(HTTPRequest $request) {
        $this->page->addVar('title','Portrait Chinois');

        $nav = new Nav('chinesePortrait');
        $this->page->addVar('leftNav', $nav->getLeftNav());
        $this->page->addVar('rightNav', $nav->getRightNav());

        $nbCPItems = $this->app->getConfig()->get('nb_CPItems');

        // On récupère le manager des items du portrait chinois
        $manager = $this->managers->getManagerOf('CPItem');

        // On récupère les données des items
        $listCPItems = $manager->getList(0, $nbCPItems);

        $this->page->addVar('listCPItems', $listCPItems);

        if ($this->app->getUser()->hasFlash()) {
            $this->page->addVar("flash", true);
            $this->page->addVar("flashInfos", $this->app->getUser()->getFlash());
        }
    }

}