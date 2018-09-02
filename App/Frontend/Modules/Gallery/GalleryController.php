<?php
/**
 * Created by PhpStorm.
 * User: yoyan
 * Date: 28/08/2018
 * Time: 12:12
 */

namespace App\Frontend\Modules\Gallery;

use \AyolyanFram\BackController;
use \AyolyanFram\HTTPRequest;
use \NavBuilder\Nav;

class GalleryController extends BackController {

    public function executeIndex(HTTPRequest $request) {
        $this->page->addVar('title', 'Gallerie');

        $nav = new Nav('gallery');
        $this->page->addVar('leftNav', $nav->getLeftNav());
        $this->page->addVar('rightNav', $nav->getRightNav());
    }

    public function executeItem() {
        // TODO: write the method
    }

}