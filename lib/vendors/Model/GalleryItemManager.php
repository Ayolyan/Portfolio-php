<?php

namespace Model;

use AyolyanFram\Manager;
use \Entity\GalleryItem;

abstract class GalleryItemManager extends Manager {

    /**
     * Method which add a gallery item in database.
     * @param GalleryItem $galleryItem
     * @return void
     */
    abstract protected function add(GalleryItem $galleryItem);

    /**
     * Method which return the total number of gallery item.
     * @return int
     */
    abstract public function count();

    /**
     * Method which delete a gallery item in database
     * @param $id
     * @return void
     */
    abstract public function delete($id);

    /**
     * Method which return the gallery item which correspond to the id
     * @param int $id The id of the gallery item in database
     * @return GalleryItem
     */
    abstract public function get($id);

    /**
     * Method which return a list of gallery items.
     * @param int $start First item to select
     * @param int $limit Items number to select
     * @return array The list of gallery items. Each entry is an instance of GalleryItem.
     */
    abstract public function getList($start = -1, $limit = -1);

    /**
     * @param GalleryItem $galleryItem
     * @return mixed
     */
    abstract protected function modify(GalleryItem $galleryItem);

    /**
     * Method which register a skill.
     * @param GalleryItem $galleryItem The gallery item to register.
     * @return void
     */
    public function save(GalleryItem $galleryItem) {
        if ($galleryItem->isValid()) {
            $galleryItem->isNew() ? $this->add($galleryItem) : $this->modify($galleryItem);
        } else {
            throw new \RuntimeException('L\'item doit être validé pour être enregistrée');
        }
    }

}