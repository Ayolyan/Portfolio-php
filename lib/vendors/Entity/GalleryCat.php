<?php
namespace Entity;

use \AyolyanFram\Entity;


class GalleryCat extends Entity{
    
    // Properties
    protected $slug;
    protected $name;
    protected $items;

    const NAME_INVALID = 1;

    public function isValid() {
        return !(empty($this->name));
    }
    
    // ******* //
    // GETTERS //
    // ******* //

    public function getName() { return $this->name; }
    public function getSlug() { return $this->slug; }
    
    // ******* //
    // SETTERS //
    // ******* //

    /**
     * @param $name
     */
    public function setName($name) {
        $name = (string)$name;
        
        if (strlen($name) >= 1 && strlen($name) <= 50) {
            $this->_name = $name;
        } else {
            $this->errors[] = self::NAME_INVALID;
        }
        
    }

    /**
     * @param mixed $items
     */
    public function setItems($items) {
        $this->items = $items;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug) {
        $this->slug = $slug;
    }
    
    // ********* //
    // FUNCTIONS //
    // ********* //
    
    public function __toString() {
        return $this->name;
    }
    
}