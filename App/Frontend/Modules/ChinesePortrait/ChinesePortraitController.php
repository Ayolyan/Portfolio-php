<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 20/08/2018
 * Time: 16:05
 */

namespace App\Frontend\Modules\ChinesePortrait;

use \AyolyanFram\BackController;
use AyolyanFram\HTTPRequest;

class ChinesePortraitController extends BackController {
    public function executeIndex(HTTPRequest $request) {
        $nbCPItems = $this->app->getConfig()->get('nb_CPItems');

        // On récupère le manager des items du portrait chinois
        $manager = $this->managers->getManagerOf('CPItem');

        // On récupère les données des items
        $listCPItems = $manager->getList(0, $nbCPItems);

        $this->page->addVar('listCPItems', $listCPItems);
    }
}