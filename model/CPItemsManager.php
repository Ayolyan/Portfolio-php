<?php
require_once('model/Manager.php');

class CPItemsManager extends Manager {
    
    public function add(CPItem $cpitem) {
        
        $db = $this->dbConnect();
        $request = $db->prepare('INSERT INTO chinese_portrait_items(svgLinkCPItem, leftText, rightText) VALUES(:svgLinkCPItem, :leftText, :rightText)');
        
        $request->bindValue(':svgLinkCPItem', $cpitem->getSvgLinkCPItem());
        $request->bindValue(':leftText',      $cpitem->getLeftText());
        $request->bindValue(':rightText',     $cpitem->getRightText());
        
        $request->execute;
        
    }
    
    public function update(CPItem $cpitem) {
        
        $db = $this->dbConnect();
        $request = $db->prepare('UPDATE chinese_portrait_items SET svgLinkCPItem = :svgLinkCPItem, leftText = :leftText, rightText = :rightText WHERE idCPItem = :idCPItem');
        
        $request->bindValue(':svgLinkCPItem', $cpitem->getSvgLinkCPItem());
        $request->bindValue(':leftText',      $cpitem->getLeftText());
        $request->bindValue(':rightText',     $cpitem->getRightText());
        $request->bindValue(':idCPItem',      $cpitem->getIdCPItem());
        
        $request->execute();
        
    }
    
    public function get($id) {
        
        $db = $this->dbConnect();
        $request = $db->query('SELECT idCPItem AS "id", svgLinkCPItem AS "svgLink", leftText, rightText FROM chinese_portrait_items WHERE idCPItem=' . $id);
        $data = $request->fetch(PDO::FETCH_ASSOC);
        
        return new CPItem($data);
        
    }
    
    public function getList() {
        
        $CPItems = [];
        
        $db = $this->dbConnect();
        $request = $db->query('SELECT idCPItem AS "id", svgLinkCPItem AS "svgLink, leftText, rightText FROM chinese_portrait_items ORDER BY idCPItem');
        
        while ($data = $request->fetch(PDO::FETCH_ASSOC)) {
            $CPItems[] = new CPItem($data);
        }
        
        return $CPItems;
        
    }
    
    public function delete(CPItem $cpitem) {
        
        $db = $this->dbConnect();
        $request = $db->query('DELETE FROM chinese_portrait_items WHERE idCPItem = ' . $cpitem->getId());
        
    }
    
}