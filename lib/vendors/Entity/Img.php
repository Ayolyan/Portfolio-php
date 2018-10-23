<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 01/10/2018
 * Time: 15:13
 */

namespace Entity;


use AyolyanFram\Entity;

class Img extends Entity {

    protected $alt;
    protected $imgLink;
    protected $idGalleryItem;

    // ******* //
    // GETTERS //
    // ******* //

    /**
     * @return mixed
     */
    public function getAlt() {
        return $this->alt;
    }

    /**
     * @return int
     */
    public function getIdGalleryItem() {
        return $this->idGalleryItem;
    }

    /**
     * @return mixed
     */
    public function getImgLink() {
        return $this->imgLink;
    }

    // ******* //
    // SETTERS //
    // ******* //

    /**
     * @param $alt
     */
    public function setAlt($alt) {
        $this->alt = $alt;
    }

    /**
     * @param mixed $idGalleryItem
     */
    public function setIdGalleryItem($idGalleryItem) {
        $this->idGalleryItem = $idGalleryItem;
    }

    /**
     * @param mixed $imgLink
     */
    public function setImgLink($imgLink) {
        $this->imgLink = $imgLink;
    }

}