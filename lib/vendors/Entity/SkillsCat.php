<?php
namespace Entity;

use \AyolyanFram\Entity;

class SkillsCat extends Entity{
    
    // Properties
    protected $name;

    const NAME_INVALID = 1;

    public function isValid() {
        return !(empty($this->name));
    }

    // ********* //
    // FUNCTIONS //
    // ********* //

    public function __toString() {
        return 'Skills categorie : ' . $this->name;
    }

    // ******* //
    // GETTERS //
    // ******* //

    public function getName() { return $this->name; }
    
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
    
}