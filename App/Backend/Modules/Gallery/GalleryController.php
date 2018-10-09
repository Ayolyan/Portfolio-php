<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 06/10/2018
 * Time: 18:06
 */

namespace App\Backend\Modules\Gallery;

use AyolyanFram\BackController;
use AyolyanFram\HTTPRequest;

class GalleryController extends BackController {

    public function executeIndex(HTTPRequest $request) {
        $this->page->addVar('title', 'Gestion de la galerie');

        $itemManager = $this->managers->getManagerOf("GalleryItem");

        $this->page->addVar('listItems', $itemManager->getList());
    }

}