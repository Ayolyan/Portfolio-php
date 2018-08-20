<?php

class LinkNav {
    
    private $_link;
    private $_text;
    private $_svgLink;
    
    const SVGLINKS  = array('presentation'    => 'Web/images/svgs/homeIcon.svg',
                            'skills'          => 'Web/images/svgs/skillsIcon.svg',
                            'chinesePortrait' => 'Web/images/svgs/chinesePortraitIcon.svg',
                            'gallery'         => 'Web/images/svgs/galleryIcon.svg',
                            'contact'         => 'Web/images/svgs/contactIcon.svg'
                            );
    const TEXTLINKS = array('presentation'    => 'Présentation',
                            'skills'          => 'Compétences',
                            'chinesePortrait' => 'Portrait Chinois',
                            'gallery'         => 'Gallery',
                            'contact'         => 'Contact'
                            );
    
    public function __construct($pageName) {
        $this->_link = 'ChinesePortraitController.php?action=' . $pageName;
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
            <a href="<?= $this->_link ?>" class="selectPage">
                <?php echo file_get_contents($this->_svgLink) ?>
                <h1><?= $this->_text ?></h1>
            </a>
<?php 
        $titleNav = ob_get_clean();
        return $titleNav;
    }
    
}