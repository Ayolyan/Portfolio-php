<?php
namespace Model;

use \Entity\CPItem;

class CPItemManagerPDO extends CPItemManager {
    
    protected function add(CPItem $cpItem) {
        $request = $this->dao->prepare('INSERT INTO chinese_portrait_items(CPItemSvgLink, leftText, rightText) VALUES(:CPItemSvgLink, :leftText, :rightText)');
        
        $request->bindValue(':CPItemSvgLink', $cpItem->getSvgLink());
        $request->bindValue(':leftText',      $cpItem->getLeftText());
        $request->bindValue(':rightText',     $cpItem->getRightText());
        
        $request->execute();
    }

    public function count() {
        return $this->dao->query('SELECT COUNT(*) FROM chinese_portrait_items')->fetchColumn();
    }

    protected function modify(CPItem $cpItem) {
        $request = $this->dao->prepare('UPDATE chinese_portrait_items SET CPItemSvgLink = :svgLinkCPItem, leftText = :leftText, rightText = :rightText WHERE idCPItem = :idCPItem');
        
        $request->bindValue(':svgLinkCPItem', $cpItem->getSvgLink());
        $request->bindValue(':leftText',      $cpItem->getLeftText());
        $request->bindValue(':rightText',     $cpItem->getRightText());
        $request->bindValue(':idCPItem',      $cpItem->getId(), \PDO::PARAM_INT);
        
        $request->execute();
    }
    
    public function get($id) {
        $request = $this->dao->prepare('SELECT idCPItem AS "id", CPItemSvgLink AS "svgLink", leftText, rightText FROM chinese_portrait_items WHERE idCPItem=:id');
        $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\CPItem');

        $CPItem = $request->fetch();

        return $CPItem;
    }
    
    public function getList($start = -1, $limit = -1) {
        $request = 'SELECT idCPItem AS "id", CPItemSvgLink AS "svgLink", leftText, rightText FROM chinese_portrait_items ORDER BY idCPItem';

        if ($start != -1 || $limit != -1) {
            $request .= ' LIMIT ' . (int) $limit . ' OFFSET ' . (int) $start;
        }

        $request = $this->dao->query($request);
        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\CPItem');

        $CPItems = $request->fetchAll();

        $request->closeCursor();
        
        return $CPItems;
    }
    
    public function delete($id) {
        $this->dao->exec('DELETE FROM chinese_portrait_items WHERE idCPItem = ' . (int) $id);
    }
    
}