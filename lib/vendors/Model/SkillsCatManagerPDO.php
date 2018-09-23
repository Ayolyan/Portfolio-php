<?php
/**
 * Created by PhpStorm.
 * User: yoyan
 * Date: 30/08/2018
 * Time: 21:23
 */

namespace Model;

use Entity\SkillsCat;

class SkillsCatManagerPDO extends SkillsCatManager {

    protected function add(SkillsCat $skillsCat) {
        $request = $this->dao->prepare('INSERT INTO skills_cat(skillsCatName) VALUES(:skillsCatName)');

        $request->bindValue(':skillsCatName', $skillsCat->getName());

        $request->execute();
    }

    public function count() {
        return $this->dao->query('SELECT COUNT(*) FROM skills_cat')->fetchColumn();
    }

    public function delete($id) {
        $this->dao->exec('DELETE FROM skills_cat WHERE idSkillsCat = ' . (int) $id);
    }

    public function get($id) {
        $request = $this->dao->prepare('SELECT idSkillsCat AS "id", skillsCatName AS "name" FROM skills_cat WHERE idSkillsCat=:id');
        $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\SkillsCat');

        $skillsCat = $request->fetch();

        return $skillsCat;
    }

    public function getList($start = -1, $limit = -1) {
        $request = 'SELECT idSkillsCat AS "id", skillsCatName AS "name" FROM skills_cat ORDER BY idSkillsCat';

        if ($start != -1 || $limit != -1) {
            $request .= ' LIMIT ' . (int) $limit . ' OFFSET ' . (int) $start;
        }

        $request = $this->dao->query($request);
        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\SkillsCat');

        $skillsCats = $request->fetchAll();

        $request->closeCursor();

        return $skillsCats;
    }

    protected function modify(SkillsCat $skillsCat) {
        $request = $this->dao->prepare('UPDATE skills_cat SET skillsCatName = :skillsCatName WHERE idSkillsCat=:idSkillsCat');

        $request->bindValue(':idSkillsCat', $skillsCat->getId(), \PDO::PARAM_INT);
        $request->bindValue(':skillsCatName', $skillsCat->getName());

        $request->execute();
    }

}