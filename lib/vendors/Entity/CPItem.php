<?php
namespace Entity;

use \AyolyanFram\Entity;

class CPItem extends Entity {

    protected $svgLink;
    protected $leftText;
    protected $rightText;

    public function isValid() {
        return !(empty($this->svgLink) || empty($this->leftText) || empty($this->rightText));
    }
    
    // ******* //
    // GETTERS //
    // ******* //

    public function getSvgLink()   { return $this->svgLink; }
    public function getLeftText()  { return $this->leftText; }
    public function getRightText() { return $this->rightText; }
    
    // ******* //
    // SETTERS //
    // ******* //

    /**
     * @param $svgLink
     */
    public function setSvgLink($svgLink) {
        $this->svgLink = $svgLink;
    }

    /**
     * @param $leftText
     */
    public function setLeftText($leftText) {
        $this->leftText = $leftText;
    }

    /**
     * @param $rightText
     */
    public function setRightText($rightText) {
        $this->rightText = $rightText;
    }
    
}