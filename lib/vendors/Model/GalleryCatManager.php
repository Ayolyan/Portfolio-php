<?php
require_once('model/Manager.php');

class GalleryCatManager extends Manager {
    
    public function add(GalleryCat $galleryCat) {
        
        $db = $this->dbConnect();
        $request = $db->prepare('INSERT INTO gallery_cat(galCatName) VALUES(:galCatName)');
        
        $request->bindValue(':galCatName', $galleryCat->getName());
        
        $request->execute();
        
    }
    
    public function update(GalleryCat $galleryCat) {
        
        $db = $this->dbConnect();
        $request = $db->prepare('UPDATE gallery_cat SET galCatName = :galCatName WHERE idGalCat = :idGalCat');

        $request->bindValue(':idGalCat',   $galleryCat->getId());
        $request->bindValue(':galCatName', $galleryCat->getName());
        
        $request->execute();
        
    }
    
    public function get($id) {
        
        $db = $this->dbConnect();
        $request = $db->query('SELECT idGalCat AS "id", galCatName AS "name" FROM gallery_cat WHERE idGalCat=' . $id);
        $data = $request->fetch(PDO::FETCH_ASSOC);
        
        return new GalleryCat($data);
        
    }
    
    public function getList() {
        
        $GalleryCats = [];
        
        $db = $this->dbConnect();
        $request = $db->query('SELECT idGalCat AS "id", galCatName AS "name" FROM gallery_cat ORDER BY idGalCat');
        
        while ($data = $request->fetch(PDO::FETCH_ASSOC)) {
            $GalleryCats[] = new GalleryCat($data);
        }
        
        return $GalleryCats;
        
    }
    
    public function delete(GalleryCat $galleryCat) {
        
        $db = $this->dbConnect();
        $request = $db->query('DELETE FROM gallery_cat WHERE idGalCat = ' . $galleryCat->getId());
        
    }
    
}