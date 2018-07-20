<?php

namespace Ayolyan\Portfolio;

class LinkNav {
    
    private $_link;
    private $_text;
    
    const $svgLinks = array();
    const $textLinks = array('presentation' => 'Présentation.php');
    
    public function __construct($pageName) {
        $this->_link = 'index?action="' . $pageName . '"';
    }
    
    public function __toString() {
        ob_start();
?>
            <a href="<?= $this->_link ?>">
                <?php include($this->_svg) ?>
                <span><?= $this->_text ?></span>
            </a>
<?php 
        $linkNav = ob_get_clean();
        return $linkNav;
    }
    
}