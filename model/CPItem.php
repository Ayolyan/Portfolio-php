<?php

class CPItem {
    
    private $_id;
    private $_svgLink;
    private $_leftText;
    private $_rightText;
    
    public function __construct($data) {
        
        if (isset($data['id'])) {
            $this->setIdCPItem($data['id']);
        }
        
        if (isset($data['svgLink'])) {
            $this->setSvgLinkCPItem($data['svgLink']);
        }
        
        if (isset($data['leftText'])) {
            $this->setLeftText($data['leftText']);
        }
        
        if (isset($data['rightText'])) {
            $this->setRightText($data['rightText']);
        }
        
    }
    
    // ******* //
    // GETTERS //
    // ******* //
    
    public function getId()        { return $this->_idCPItem; }
    public function getSvgLink()   { return $this->_svgLinkCPItem; }
    public function getLeftText()  { return $this->_leftText; }
    public function getRightText() { return $this->_rightText; }
    
    // ******* //
    // SETTERS //
    // ******* //
    
    public function setId($id) {
        $id = (int)$id;
        
        if ($id >= 0) {
            $this->_id = $id;
        } else {
            throw new Exception('Impossible id value.');
        }
    }
    
    public function setSvgLink($svgLink) {
        $this->_svgLinkCPItem = $svgLink;
    }
    
    public function setLeftText($leftText) {
        $this->_leftText = $leftText;
    }
    
    public function setRightText($rightText) {
        $this->_rightText = $rightText;
    }
    
}