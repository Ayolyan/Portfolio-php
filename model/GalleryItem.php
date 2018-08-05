<?php

class GalleryItem {
    
    // Properties
    private $_id;
    private $_name;
    private $_imgLink;
    private $_creationDate;
    private $_description;
    private GalleryCat[] $_cats;
    
    public function __construct($id, $name, $imgLink, $creationDate, $description) {
        if (isset($id)) {
            $this->setId($id);
        }
        
        if (isset($name)) {
            $this->setName($name);
        }
        
        if (isset($imgLink)) {
            $this->setImgLink($imgLink);
        }
        
        if (isset($creationDate)) {
            $this->setCreationDate($creationDate);
        }
        
        if (isset($description)) {
            $this->setDescription($description);
        }
    }
    
    public function __construct($data) {
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
        
        if (isset($data['name'])) {
            $this->setName($data['name']);
        }
        
        if (isset($data['imgLink'])) {
            $this->setImgLink($data['imgLink']);
        }
        
        if (isset($data['creationDate'])) {
            $this->setCreationDate($data['creationDate']);
        }
        
        if (isset($data['description'])) {
            $this->setDescription($data['description']);
        }
    }
    
    // ******* //
    // GETTERS //
    // ******* //
    
    public function getId()           { return $this->_id; }
    public function getName()         { return $this->_name; }
    public function getImgLink()      { return $this->_imgLink; }
    public function getCreationDate() { return $this->_creationDate; }
    public function getDescription()  { return $this->_description; }
    public function getCats()         { return $this->_cats; }
    
    // ******* //
    // SETTERS //
    // ******* //
    
    public function setId($id) {
        $id = (int)$id;
        
        if ($id >= 0) {
            $this->_id = $id;
        } else {
            throw new Exception('Impossible id value.');
        }
    }
    
    public function setName($name) {
        $name = (string)$name;
        
        if (strlen($name) >= 1 && strlen($name) <= 50) {
            $this->_name = $name;
        } else {
            throw new Exception('Gallery Item\'s name is too long.');
        }
    }
    
    public function setImgLink($imgLink) {
        $imgLink = (string)$imgLink;
        
        if (strlen($imgLink) >= 1 && strlen($imgLink) <= 250) {
            $this->_imgLink = $imgLink;
        } else {
            throw new Exception('Image link\'s is too long.');
        }
    }
    
    public function setCreationDate($creationDate) {
        $this->_creationDate = $creationDate;
    }
    
    public function setDescription($description) {
        $this->_description = $description;
    }
    
    // ********* //
    // FUNCTIONS //
    // ********* //
    
    public function __toString() {
        return $this->_name;
    }
    
}