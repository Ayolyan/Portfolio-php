<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 01/10/2018
 * Time: 20:22
 */

namespace Model;


class MediaManagerPDO extends MediaManager {

    public function get($id) {
        $request = $this->dao->prepare('SELECT idMedia AS "id", mediaLink, alt, type, idGalleryItem FROM media WHERE idImg=:id');
        $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Media');

        $galleryItem = $request->fetch();

        return $galleryItem;
    }

    public function getListFromItem($id, $start = -1, $limit = -1) {
        $request = 'SELECT idMedia AS "id", mediaLink, alt, type, idGalleryItem FROM media WHERE idGalleryItem=:id';
        if ($start != -1 || $limit != -1) {
            $request .= ' LIMIT ' . (int) $limit . ' OFFSET ' . (int) $start;
        }

        $request = $this->dao->prepare($request);
        $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Media');

        $galleryItems = $request->fetchAll();

        $request->closeCursor();

        return $galleryItems;
    }

}