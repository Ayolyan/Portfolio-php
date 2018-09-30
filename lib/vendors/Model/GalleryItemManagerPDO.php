<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 22/09/2018
 * Time: 16:47
 */

namespace Model;

use Entity\GalleryItem;

class GalleryItemManagerPDO extends GalleryItemManager {

    public function add(GalleryItem $galleryItem) {
        $request = $this->dao->prepare('INSERT INTO gallery_item(name, mainImgLink, miniatureImgLink, creationDate, description) VALUES(:name, :mainImgLink, :miniatureImgLink, :creationDate, :description)');

        $request->bindValue(':name',  $galleryItem->getName());
        $request->bindValue(':mainImgLink',  $galleryItem->getMainImgLink());
        $request->bindValue(':miniatureImgLink',  $galleryItem->getMiniatureImgLink());
        $request->bindValue(':creationDate', $galleryItem->getCreationDate());
        $request->bindValue(':description',  $galleryItem->getDescription());

        $request->execute();
    }

    public function count() {
        return $this->dao->query('SELECT COUNT(*) FROM gallery_items')->fetchColumn();
    }

    public function delete($id) {
        $this->dao->exec('DELETE FROM gallery_item WHERE idGalleryItem = ' . (int) $id);
    }

    public function get($id) {
        $request = $this->dao->prepare('SELECT idGalleryItem AS "id", name, mainImgLink, miniatureImgLink, creationDate, description FROM gallery_item WHERE idGalleryItem=' . $id);
        $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\GalleryItem');

        $galleryItem = $request->fetch();

        return $galleryItem;
    }

    public function getList($start = -1, $limit = -1) {
        //$request = 'SELECT idGalleryItem AS "id", name, mainImgLink, miniatureImgLink, creationDate, description FROM gallery_item ORDER BY creationDate DESC';
        $request = 'SELECT gallery_item.idGalleryItem AS "id", name, mainImgLink, miniatureImgLink, creationDate, description, galCatName AS "cats" FROM gallery_item INNER JOIN contain_gitem ON gallery_item.idGalleryItem = contain_gitem.idGalleryItem INNER JOIN gallery_cat ON gallery_cat.idGalCat = contain_gitem.idGalCat ORDER BY creationDate DESC';
        if ($start != -1 || $limit != -1) {
            $request .= ' LIMIT ' . (int) $limit . ' OFFSET ' . (int) $start;
        }

        $request = $this->dao->query($request);
        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\GalleryItem');

        $galleryItems = $request->fetchAll();

        $request->closeCursor();

        return $galleryItems;
    }

    protected function modify(GalleryItem $galleryItem) {
        $request = $this->dao->prepare('UPDATE gallery_item SET name = :name, mainImgLink = :mainImgLink, miniatureImgLink = :miniatureImgLink, creationDate = :creationDate, description = :description WHERE idGalleryItem = :idGalleryItem');

        $request->bindValue(':name',  $galleryItem->getName());
        $request->bindValue(':idGalleryItem',   $galleryItem->getId());
        $request->bindValue(':mainImgLink',  $galleryItem->getMainImgLink());
        $request->bindValue(':miniatureImgLink',  $galleryItem->getMiniatureImgLink());
        $request->bindValue(':creationDate', $galleryItem->getCreationDate());
        $request->bindValue(':description',  $galleryItem->getDescription());

        $request->execute();
    }

}