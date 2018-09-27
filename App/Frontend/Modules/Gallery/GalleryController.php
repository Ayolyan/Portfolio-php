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
use Entity\GalleryItem;
use \NavBuilder\Nav;

class GalleryController extends BackController {

    public function executeIndex(HTTPRequest $request) {
        $this->page->addVar('title', 'Gallerie');

        $nav = new Nav('gallery');
        $this->page->addVar('leftNav', $nav->getLeftNav());
        $this->page->addVar('rightNav', $nav->getRightNav());
    }

    public function executeGallery(HTTPRequest $request) {
        $this->page->addVar('title', 'Gallerie');

        $nav = new Nav('gallery');
        $this->page->addVar('leftNav', $nav->getLeftNav());
        $this->page->addVar('rightNav', $nav->getRightNav());
    }

    public function executeItem(HTTPRequest  $request) {
        $itemId = $request->getData('id');

        $manager = $this->managers->getManagerOf('GalleryItem');
        $item = $manager->get($itemId);


        $this->page->addVar('title', 'Gallerie');

        $nav = new Nav('gallery');
        $this->page->addVar('leftNav', $nav->getLeftNav());
        $this->page->addVar('rightNav', $nav->getRightNav());
    }

}