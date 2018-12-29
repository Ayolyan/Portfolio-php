<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 01/10/2018
 * Time: 15:13
 */

namespace Entity;


use AyolyanFram\Entity;

class Media extends Entity {

    protected $alt;
    protected $mediaLink;
    protected $type;
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
    public function getMediaLink() {
        return $this->mediaLink;
    }

    /**
     * @return mixed
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @return String
     */
    public function getVideoId() {
        if ($this->type == 'video') {
            $videoId = strstr($this->mediaLink, 'v=');
            $videoId = strstr($videoId, '&', true);
            $videoId = substr($videoId, 2);
            return $videoId;
        } else {
            new \Exception("");
        }
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

    /**
     * @param mixed $type
     */
    public function setType($type) {
        $this->type = $type;
    }

}