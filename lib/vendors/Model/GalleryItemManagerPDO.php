<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 22/09/2018
 * Time: 16:47
 */

use Entity\GalleryItem;

class GalleryItemManagerPDO extends GalleryItemManager {

    public function add(GalleryItem $galleryItem) {
        $request = $this->dao->prepare('INSERT INTO gallery_items(galItemImgLink, creationDate, description) VALUES(:galItemImgLink, :creationDate, :description)');

        $request->bindValue(':galItemImgLink',  $galleryItem->getImgLink());
        $request->bindValue(':galCreationDate', $galleryItem->getCreationDate());
        $request->bindValue(':galDescription',  $galleryItem->getDescription());

        $request->execute();
    }

    public function count() {
        return $this->dao->query('SELECT COUNT(*) FROM gallery_items')->fetchColumn();
    }

    public function delete($id) {
        $this->dao->exec('DELETE FROM gallery_items WHERE idGalleryItems = ' . (int) $id);
    }

    public function get($id) {
        $request = $this->dao->prepare('SELECT idGalleryItems AS "id", galItemImgLink AS "imgLink", creationDate, description FROM gallery_items WHERE idGalleryItems=' . $id);
        $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\GalleryItem');

        $galleryItem = $request->fetch();

        return $galleryItem;
    }

    public function getList($start = -1, $limit = -1) {
        $request = 'SELECT idGalleryItems AS "id", galItemImgLink AS "imgLink", creationDate, description FROM gallery_items ORDER BY idGalleryItems';

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
        $request = $this->dao->prepare('UPDATE gallery_items SET galItemImgLink = :galItemImgLink, creationDate = :creationDate, description = :description WHERE idGalleryItem = :idGalleryItem');

        $request->bindValue(':idGalleryItem',   $galleryItem->getId());
        $request->bindValue(':galItemImgLink',  $galleryItem->getImgLink());
        $request->bindValue(':galCreationDate', $galleryItem->getCreationDate());
        $request->bindValue(':galDescription',  $galleryItem->getDescription());

        $request->execute();
    }

}