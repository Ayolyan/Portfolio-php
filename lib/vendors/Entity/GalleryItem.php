<?php
namespace Entity;

use \AyolyanFram\Entity;

class GalleryItem extends Entity{
    
    // Properties
    protected $name;
    protected $imgLink;
    protected $creationDate;
    protected $description;
    protected $cats;
    
    // ******* //
    // GETTERS //
    // ******* //

    public function getName()         { return $this->name; }
    public function getImgLink()      { return $this->imgLink; }
    public function getCreationDate() { return $this->creationDate; }
    public function getDescription()  { return $this->description; }
    public function getCats()         { return $this->cats; }

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
    
    public function setImgLink($imgLink) {
        $imgLink = (string)$imgLink;
        
        if (strlen($imgLink) >= 1 && strlen($imgLink) <= 250) {
            $this->imgLink = $imgLink;
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
    
    // ********* //
    // FUNCTIONS //
    // ********* //
    
    public function __toString() {
        return 'Gallery item :' . $this->name;
    }
    
}