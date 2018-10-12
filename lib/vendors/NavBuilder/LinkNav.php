<?php
namespace NavBuilder;

class LinkNav {
    
    private $_link;
    private $_text;
    private $_svgLink;
    
    const SVGLINKS  = array('index'           => __DIR__.'/../../../Web/images/svgs/homeIcon.svg',
                            'profile'         => __DIR__.'/../../../Web/images/svgs/profileIcon.svg',
                            'skills'          => __DIR__.'/../../../Web/images/svgs/skillsIcon.svg',
                            'chinesePortrait' => __DIR__.'/../../../Web/images/svgs/chinesePortraitIcon.svg',
                            'gallery'         => __DIR__.'/../../../Web/images/svgs/galleryIcon.svg',
                            'contact'         => __DIR__.'/../../../Web/images/svgs/contactIcon.svg'
                            );
    const TEXTLINKS = array('index'           => 'Accueil',
                            'profile'         => 'Mon Profil',
                            'skills'          => 'Compétences',
                            'chinesePortrait' => 'Portrait Chinois',
                            'gallery'         => 'Ma Gallerie',
                            'contact'         => 'Me Contacter'
                            );
    
    public function __construct($pageName) {
        $this->_link = '/' . $pageName;
        $this->_text = self::TEXTLINKS[$pageName];
        $this->_svgLink = self::SVGLINKS[$pageName];
    }
    
    public function __toString() {
        ob_start();
?>
            <a href="<?= $this->_link ?>">
                <?= file_get_contents($this->_svgLink) ?>
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