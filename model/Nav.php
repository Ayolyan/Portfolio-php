<?php

namespace Ayolyan\Portfolio;

class Nav {
    
    private $_leftNav;
    private $_rightNav;
    
    public function getLeftNav() {
        return $this->$_leftNav;
    }
    
    public function getRightNav() {
        return $this->$_rightNav;
    }
    
}