<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 01/10/2018
 * Time: 15:08
 */

namespace Entity;


use AyolyanFram\Entity;

class GalleryItemLink extends Entity {

    protected $name;
    protected $link;
    protected $iconLink;
    protected $idGalleryItem;

    // ******* //
    // GETTERS //
    // ******* //

    /**
     * @return mixed
     */
    public function getIconLink() {
        return $this->iconLink;
    }

    /**
     * @return mixed
     */
    public function getIdGalleryItem() {
        return $this->idGalleryItem;
    }

    /**
     * @return mixed
     */
    public function getLink() {
        return $this->link;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    // ******* //
    // SETTERS //
    // ******* //

    /**
     * @param mixed $iconLink
     */
    public function setIconLink($iconLink) {
        $this->iconLink = $iconLink;
    }

    /**
     * @param mixed $idGalleryItem
     */
    public function setIdGalleryItem($idGalleryItem) {
        $this->idGalleryItem = $idGalleryItem;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link) {
        $this->link = $link;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->name = $name;
    }

}