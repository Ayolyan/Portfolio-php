<?php
/**
 * Created by PhpStorm.
 * User: yoyan
 * Date: 30/08/2018
 * Time: 22:13
 */

namespace Model;

use \Entity\Skill;

class SkillManagerPDO extends SkillManager {

    protected function add(Skill $skill) {
        $request = $this->dao->prepare('INSERT INTO skills(skillName, skillSvgLink, skillProgress, idSkillsCat) VALUES(:skillName, :skillSvgLink, :skillProgress, :idSkillsCat)');

        $request->bindValue(':skillName',     $skill->getName());
        $request->bindValue(':skillSvgLink',  $skill->getSvgLink());
        $request->bindValue(':skillProgress', $skill->getProgress());
        $request->bindValue(':idSkillsCat',   $skill->getCatId());

        $request->execute();
    }

    public function count() {
        return $this->dao->query('SELECT COUNT(*) FROM skills')->fetchColumn();
    }

    public function delete($id) {
        $this->dao->exec('DELETE FROM skills WHERE idSkill = ' . (int) $id);
    }

    public function get($id) {
        $request = $this->dao->prepare('SELECT idSkill AS "id", skillName AS "name", skillSvgLink AS "svgLink", skillProgress AS "progress", idSkillsCat AS "catId" FROM skills WHERE idSkill=:id');
        $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\SkillsCat');

        $skill = $request->fetch();

        return $skill;
    }

    public function getList($start = -1, $limit = -1) {
        $request = 'SELECT idSkill AS "id", skillName AS "name", skillSvgLink AS "svgLink", skillProgress AS "progress", idSkillsCat AS "catId" FROM skills ORDER BY idSkill';

        if ($start != -1 || $limit != -1) {
            $request .= ' LIMIT ' . (int) $limit . ' OFFSET ' . (int) $start;
        }

        $request = $this->dao->query($request);
        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Skill');

        $skills = $request->fetchAll();

        $request->closeCursor();

        return $skills;
    }

    public function getListFromCat($catId, $limit = -1) {
        $request = 'SELECT idSkill AS "id", skillName AS "name", skillSvgLink AS "svgLink", skillProgress AS "progress", idSkillsCat AS "catId" FROM skills WHERE idSkillsCat=:idSkillsCat ORDER BY idSkill';

        if ($limit != -1) {
            $request .= ' LIMIT ' . (int) $limit;
        }

        $request = $this->dao->prepare($request);
        $request->bindValue(':idSkillsCat', $catId);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Skill');

        $skills = $request->fetchAll();

        $request->closeCursor();

        return $skills;
    }

    protected function modify(Skill $skill) {
        $request = $this->dao->prepare('UPDATE skills_cat SET skillsCatName = :skillsCatName WHERE idSkillsCat=:idSkillsCat');

        $request->bindValue(':idSkillsCat', $skill->getId(), \PDO::PARAM_INT);
        $request->bindValue(':skillsCatName', $skill->getName());

        $request->execute();
    }

}