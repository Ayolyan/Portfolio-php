<?php
namespace Model;

use \Entity\CPItem;

class CPItemManagerPDO extends CPItemManager {
    
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
        $request = $this->dao->prepare('SELECT idCPItem AS "id", svgLinkCPItem AS "svgLink", leftText, rightText FROM chinese_portrait_items WHERE idCPItem= :id');
        $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\CPItem');

        $CPItem = $request->fetch();

        return $CPItem;
        
    }
    
    public function getList($start = -1, $limit = -1) {
        $sql = 'SELECT idCPItem AS "id", CPItemSvgLink AS "svgLink", leftText, rightText FROM chinese_portrait_items ORDER BY idCPItem';

        if ($start != -1 || $limit != -1) {
            $sql .= ' LIMIT ' . (int) $limit . ' OFFSET ' . (int) $start;
        }

        $request = $this->dao->query($sql);
        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\CPItem');

        $CPItems = $request->fetchAll();

        $request->closeCursor();
        
        return $CPItems;
    }
    
    public function delete(CPItem $cpitem) {

        $request = $this->dao->query('DELETE FROM chinese_portrait_items WHERE idCPItem = ' . $cpitem->getId());
        
    }
    
}