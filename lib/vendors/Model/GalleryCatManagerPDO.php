<?php
/**
 * Created by PhpStorm.
 * User: yoyan
 * Date: 29/12/2018
 * Time: 10:47
 */

namespace Model;


use Entity\GalleryCat;

class GalleryCatManagerPDO extends GalleryCatManager {

    public function add(GalleryCat $galleryCat) {
        $request = $this->dao->prepare('INSERT INTO gallery_cat(slug, galCatName) VALUES(:slug, :galCatName)');

        $request->bindValue(':slug',  $galleryCat->getSlug());
        $request->bindValue(':galCatName',  $galleryCat->getName());

        $request->execute();
    }

    public function count() {
        return $this->dao->query('SELECT COUNT(*) FROM gallery_cat')->fetchColumn();
    }

    public function delete($id) {
        $this->dao->exec('DELETE FROM gallery_cat WHERE idGalCat = ' . (int) $id);
    }

    public function get($id) {
        $request = $this->dao->prepare('SELECT idGalCat AS "id", slug, galCatName AS "name" FROM gallery_cat WHERE idGalCat=:id');
        $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\GalleryCat');

        $galleryCat = $request->fetch();

        return $galleryCat;
    }

    public function getList($start = -1, $limit = -1) {
        $request = 'SELECT idGalCat AS "id", slug, galCatName AS "name" FROM gallery_cat ORDER BY galCatName ASC';
        if ($start != -1 || $limit != -1) {
            $request .= ' LIMIT ' . (int) $limit . ' OFFSET ' . (int) $start;
        }

        $request = $this->dao->query($request);
        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\GalleryCat');

        $galleryItems = $request->fetchAll();

        $request->closeCursor();

        return $galleryItems;
    }

    protected function modify(GalleryCat $galleryCat) {
        $request = $this->dao->prepare('UPDATE gallery_cat SET slug = :slug, galCatName = :galCatName WHERE idGalCat = :idGalCat');

        $request->bindValue(':idGalCat',   $galleryCat->getId());
        $request->bindValue(':slug',       $galleryCat->getSlug());
        $request->bindValue(':galCatName', $galleryCat->getName());

        $request->execute();
    }

}