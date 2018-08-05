<?php

class GalleryCat {
    
    // Properties
    private $_id;
    private $_name;
    private GalleryItem[] $_items;
    
    public function __construct($id, $name) {
        if (isset($id)) {
            $this->setId($id);
        }
        
        if (isset($name)) {
            $this->setName($name);
        }
    }
    
    public function __construct($data) {
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
        
        if (isset($data['name'])) {
            $this->setName($data['name']);
        }
    }
    
    // ******* //
    // GETTERS //
    // ******* //
    
    public function getId()   { return $this->_id; }
    public function getName() { return $this->_name; }
    
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
            throw new Exception('Skills categorie\'s name is too long.');
        }
        
    }
    
    // ********* //
    // FUNCTIONS //
    // ********* //
    
    public function __toString() {
        return $this->_name;
    }
    
}