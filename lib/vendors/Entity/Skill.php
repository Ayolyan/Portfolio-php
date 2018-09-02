<?php
namespace Entity;

use \AyolyanFram\Entity;

class Skill extends Entity {
    
    // Properties
    protected $name;
    protected $svgLink;
    protected $progress;
    protected $catId;

    const NAME_INVALID = 1;
    const SVGLINK_INVALID = 2;
    const PROGRESS_INVALID = 3;
    const CAT_INVALID = 4;

    public function isValid() {
        return !(empty($this->name) || empty($this->svgLink) || empty($this->progress));
    }
    
    // ******* //
    // GETTERS //
    // ******* //

    public function getName() { return $this->name; }
    public function getSvgLink() { return $this->svgLink; }
    public function getProgress() { return $this->progress; }
    public function getCatId() { return $this->catId; }
    
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
    
    public function setSvglink($svgLink) {
        $svgLink = (string)$svgLink;
        
        if (strlen($svgLink) >= 1 && strlen($svgLink) <= 250) {
            $this->svgLink = $svgLink;
        } else {
            $this->errors[] = self::SVGLINK_INVALID;
        }        
    }
    
    public function setProgress($progress) {
        $this->progress = $progress;
    }
    
    public function setCatId($catId) {
        $this->catId = $catId;
    }
    
    // ********* //
    // FUNCTIONS //
    // ********* //
    
    public function __toString() {
        return 'Skill : ' . $this->name;
    }
    
}