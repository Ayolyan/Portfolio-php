<?php
namespace Entity;

use \AyolyanFram\Entity;

class GalleryItem extends Entity{
    
    // Properties
    protected $name;
    protected $mainImgLink;
    protected $miniatureImgLink;
    protected $creationDate;
    protected $description;
    protected $cats;
    protected $linksIds;
    protected $mediasIds;
    
    // ******* //
    // GETTERS //
    // ******* //

    public function getName()             { return $this->name; }
    public function getMainImgLink()      { return $this->mainImgLink; }
    public function getMiniatureImgLink() { return $this->miniatureImgLink; }
    public function getCreationDate()     { return $this->creationDate; }
    public function getDescription()      { return $this->description; }
    public function getCats()             { return $this->cats; }
    public function getLinksIds()         { return $this->linksIds; }
    public function getMediasIds()        { return $this->mediasIds; }


    const NAME_INVALID = 1;
    const IMGLINK_INVALID = 2;

    public function isValid() {
        return !(empty($this->name) || empty($this->imgLink) || empty($this->creationDate) || empty($this->description));
    }
    
    // ******* //
    // SETTERS //
    // ******* //
    
    public function setName($name) {
        $name = (string)$name;
        
        if (strlen($name) >= 1 && strlen($name) <= 50) {
            $this->name = $name;
        } else {
            $this->errors[] = self::NAME_INVALID;
        }
    }
    
    public function setMainImgLink($imgLink) {
        $imgLink = (string)$imgLink;
        
        if (strlen($imgLink) >= 1 && strlen($imgLink) <= 250) {
            $this->mainImgLink = $imgLink;
        } else {
            $this->errors[] = self::IMGLINK_INVALID;
        }
    }

    public function setMiniatureImgLink($imgLink) {
        $imgLink = (string)$imgLink;

        if (strlen($imgLink) >= 1 && strlen($imgLink) <= 250) {
            $this->miniatureImgLink = $imgLink;
        } else {
            $this->errors[] = self::IMGLINK_INVALID;
        }
    }
    
    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @param mixed $imgsIds
     */
    public function setMediasIds($mediasIds) {
        $this->mediasIds = $mediasIds;
    }

    /**
     * @param mixed $linksIds
     */
    public function setLinksIds($linksIds) {
        $this->linksIds = $linksIds;
    }
    
    // ********* //
    // FUNCTIONS //
    // ********* //
    
    public function __toString() {
        return 'Gallery item :' . $this->name;
    }
    
}