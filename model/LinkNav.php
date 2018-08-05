<?php

class LinkNav {
    
    private $_link;
    private $_text;
    private $_svgLink;
    
    const SVGLINKS  = array('presentation'    => 'public/images/svgs/homeIcon.svg',
                            'skills'          => 'public/images/svgs/skillsIcon.svg',
                            'chinesePortrait' => 'public/images/svgs/chinesePortraitIcon.svg',
                            'gallery'         => 'public/images/svgs/galleryIcon.svg',
                            'contact'         => 'public/images/svgs/contactIcon.svg'
                            );
    const TEXTLINKS = array('presentation'    => 'Présentation',
                            'skills'          => 'Compétences',
                            'chinesePortrait' => 'Portrait Chinois',
                            'gallery'         => 'Galerie',
                            'contact'         => 'Contact'
                            );
    
    public function __construct($pageName) {
        $this->_link = 'index.php?action=' . $pageName;
        $this->_text = self::TEXTLINKS[$pageName];
        $this->_svgLink = self::SVGLINKS[$pageName];
    }
    
    public function __toString() {
        ob_start();
?>
            <a href="<?= $this->_link ?>">
                <?php echo file_get_contents($this->_svgLink) ?>
                <span><?= $this->_text ?></span>
            </a>
<?php 
        $linkNav = ob_get_clean();
        return $linkNav;
    }
    
    public function toTitle() {
        ob_start();
?>
            <a href="<?= $this->_link ?>">
                <?php echo file_get_contents($this->_svgLink) ?>
                <h1><?= $this->_text ?></h1>
            </a>
<?php 
        $titleNav = ob_get_clean();
        return $titleNav;
    }
    
}