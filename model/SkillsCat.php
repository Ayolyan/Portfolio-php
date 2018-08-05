<?php

class SkillsCat {
    
    // Properties
    private $_id;
    private $_name;
    
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