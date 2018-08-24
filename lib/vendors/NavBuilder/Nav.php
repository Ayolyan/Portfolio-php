<?php
namespace NavBuilder;

class Nav {
    
    private $_leftNav;
    private $_rightNav;
    
    const LINKS = array('contact',
                        'index',
                        'skills',
                        'chinesePortrait',
                        'gallery');
    
    public function __construct($page) {
        $this->_leftNav = $this->linksAssembler($page, 'left');
        $this->_rightNav = $this->linksAssembler($page, 'right');
    }
    
    public function getLeftNav() {
        return $this->_leftNav;
    }
    
    public function getRightNav() {
        return $this->_rightNav;
    }
    
    public function linksAssembler($page, $side) {
        ob_start();
        if (in_array($page, self::LINKS)) {
            if ($side == 'left') {
                for ($i = 0; $i < array_search($page, self::LINKS); $i++) {
                    $link = new LinkNav(self::LINKS[$i]);
                    echo($link);
                }
            } else if ($side == 'right') {
                for ($i = array_search($page, self::LINKS); $i < count(self::LINKS); $i++) {
                    $link = new LinkNav(self::LINKS[$i]);
                    echo($i == array_search($page, self::LINKS) ? $link->toTitle() : $link);
                }
            } else {
                throw new \InvalidArgumentException('The value of $side parameters must be "left" or "right"');
            }
        } else {
            throw new \InvalidArgumentException('The value of $page parameters isn\'t good');
        }
        $nav = ob_get_clean();
        return $nav;
    }
    
}