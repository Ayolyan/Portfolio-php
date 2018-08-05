<?php

class Skill {
    
    // Properties
    private $_id;
    private $_name;
    private $_svgLink;
    private $_progress;
    private SkillsCat $_cat;
    
    public function __construct($id, $name, $svgLink, $progress, SkillsCat $cat) {
        if (isset($id)) {
            $this->setId($id);
        }
        
        if (isset($name)) {
            $this->setName($name);
        }
        
        if (isset($svgLink)) {
            $this->setSvgLink($svgLink);
        }
        
        if (isset($progress)) {
            $this->setProgress($progress);
        }
        
        if (isset($cat)) {
            $this->setCat($cat);
        }
    }
    
    public function __construct($data) {
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
        
        if (isset($data['name'])) {
            $this->setName($data['name']);
        }
        
        if (isset($data['svgLink'])) {
            $this->setSvgLink($data['svgLink']);
        }
        
        if (isset($data['progress'])) {
            $this->setProgress($data['progress']);
        }
        
        if (isset($data['cat'])) {
            $this->setCat($data['cat']);
        }
    }
    
    // ******* //
    // GETTERS //
    // ******* //
    
    public function getId()   { return $this->_id; }
    public function getName() { return $this->_name; }
    public function getSvgLink() { return $this->_svgLink; }
    public function getProgress() { return $this->_progress; }
    public function getCat() { return $this->_cat; }
    
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
            throw new Exception('Skill\'s name is too long.');
        }
    }
    
    public function setSvglink($svgLink) {
        $svgLink = (string)$svgLink;
        
        if (strlen($svgLink) >= 1 && strlen($svgLink) <= 250) {
            $this->_svgLink = $svgLink;
        } else {
            throw new Exception('Skill\'s name is too long.');
        }        
    }
    
    public function setProgress($progress) {
        $this->_progress = $progress;
    }
    
    public function setCat(SkillsCat $cat) {
        $this->_cat = $cat;
    }
    
    // ********* //
    // FUNCTIONS //
    // ********* //
    
    public function __toString() {
        return $this->_name;
    }
    
}