<?php

namespace Model;

use AyolyanFram\Manager;
use Entity\GalleryCat;

abstract class GalleryCatManager extends Manager {

    /**
     * Method which add a gallery category in database.
     * @param GalleryCat $galleryCat
     * @return void
     */
    abstract protected function add(GalleryCat $galleryCat);

    /**
     * Method which return the total number of gallery categories.
     * @return int
     */
    abstract public function count();

    /**
     * Method which delete a gallery category in database
     * @param $id
     * @return void
     */
    abstract public function delete($id);

    /**
     * Method which return the gallery category which correspond to the id
     * @param int $id The id of the gallery category in database
     * @return GalleryCat
     */
    abstract public function get($id);

    /**
     * Method which return a list of gallery categories.
     * @param int $start First category to select
     * @param int $limit Items number to select
     * @return array The list of gallery categories. Each entry is an instance of GalleryCat.
     */
    abstract public function getList($start = -1, $limit = -1);

    /**
     * @param GalleryCat $galleryCat
     * @return mixed
     */
    abstract protected function modify(GalleryCat $galleryCat);

    /**
     * Method which register a gallery category.
     * @param GalleryCat $galleryCat The gallery item to register.
     * @return void
     */
    public function save(GalleryCat $galleryCat) {
        if ($galleryCat->isValid()) {
            $galleryCat->isNew() ? $this->add($galleryCat) : $this->modify($galleryCat);
        } else {
            throw new \RuntimeException('La categorie doit être validée pour être enregistrée');
        }
    }

}