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
        $this->page->addVar('title', 'Galerie');

        $nav = new Nav('gallery');
        $this->page->addVar('leftNav', $nav->getLeftNav());
        $this->page->addVar('rightNav', $nav->getRightNav());

        $managerCat = $this->managers->getManagerOf('GalleryCat');
        $cats = $managerCat->getList();

        $managerItem = $this->managers->getManagerOf('GalleryItem');
        $mixedItems = $managerItem->getList();

        $this->page->addVar('cats', $cats);
        $this->page->addVar('mixedItems', $mixedItems);
    }

    public function executeItem(HTTPRequest  $request) {
        $itemId = $request->getData('id');

        $itemManager = $this->managers->getManagerOf('GalleryItem');
        $item = $itemManager->get($itemId);

        $linksManager = $this->managers->getManagerOf('GalleryItemLink');
        $links = $linksManager->getListFromItem($itemId);

        $mediasManager = $this->managers->getManagerOf('Media');
        $medias = $mediasManager->getListFromItem($itemId);

        $this->page->addVar('item', $item);
        $this->page->addVar('links', $links);
        $this->page->addVar('medias', $medias);
        $this->page->addVar('title', 'Galerie : '. $item["name"]);

        $nav = new Nav('gallery');
        $this->page->addVar('leftNav', $nav->getLeftNav());
        $this->page->addVar('rightNav', $nav->getRightNav());
    }

}