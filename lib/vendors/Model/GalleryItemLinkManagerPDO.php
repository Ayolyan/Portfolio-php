<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 01/10/2018
 * Time: 15:23
 */

namespace Model;


class GalleryItemLinkManagerPDO extends GalleryItemLinkManager {

    public function get($id) {
        $request = $this->dao->prepare('SELECT idLink AS "id", name, link, iconLink, idGalleryItem FROM link WHERE idLink=:id');
        $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\GalleryItemLink');

        $galleryItem = $request->fetch();

        return $galleryItem;
    }

    public function getListFromItem($id, $start = -1, $limit = -1) {
        $request = 'SELECT idLink AS "id", name, link, iconLink, idGalleryItem FROM link WHERE idGalleryItem=:id';
        if ($start != -1 || $limit != -1) {
            $request .= ' LIMIT ' . (int) $limit . ' OFFSET ' . (int) $start;
        }

        $request = $this->dao->prepare($request);
        $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\GalleryItemLink');

        $galleryItems = $request->fetchAll();

        $request->closeCursor();

        return $galleryItems;
    }

}