<?php
require_once('model/Manager.php');

class GalleryItemManager extends Manager {

    public function add(GalleryItem $galleryItem) {

        $db = $this->dbConnect();
        $request = $db->prepare('INSERT INTO gallery_items(galItemImgLink, creationDate, description) VALUES(:galItemImgLink, :creationDate, :description)');

        $request->bindValue(':galItemImgLink',  $galleryItem->getImgLink());
        $request->bindValue(':galCreationDate', $galleryItem->getCreationDate());
        $request->bindValue(':galDescription',  $galleryItem->getDescription());

        $request->execute();

    }

    public function update(GalleryItem $galleryItem) {

        $db = $this->dbConnect();
        $request = $db->prepare('UPDATE gallery_items SET galItemImgLink = :galItemImgLink, creationDate = :creationDate, description = :description WHERE idGalleryItem = :idGalleryItem');

        $request->bindValue(':idGalleryItem',   $galleryItem->getId());
        $request->bindValue(':galItemImgLink',  $galleryItem->getImgLink());
        $request->bindValue(':galCreationDate', $galleryItem->getCreationDate());
        $request->bindValue(':galDescription',  $galleryItem->getDescription());

        $request->execute();

    }

    public function get($id) {

        $db = $this->dbConnect();
        $request = $db->query('SELECT idGalleryItems AS "id", galItemImgLink AS "imgLink", creationDate, description FROM gallery_items WHERE idGalleryItems=' . $id);
        $data = $request->fetch(PDO::FETCH_ASSOC);

        return new GalleryItem($data);

    }

    public function getList() {

        $GalleryItems = [];

        $db = $this->dbConnect();
        $request = $db->query('SELECT idGalleryItems AS "id", galItemImgLink AS "imgLink", creationDate, description FROM gallery_items ORDER BY idGalleryItems');

        while ($data = $request->fetch(PDO::FETCH_ASSOC)) {
            $GalleryItems[] = new GalleryItem($data);
        }

        return $GalleryItems;

    }

    public function delete(GalleryItem $galleryItem) {

        $db = $this->dbConnect();
        $request = $db->query('DELETE FROM gallery_items WHERE idGalleryItems = ' . $galleryItem->getId());

    }

}