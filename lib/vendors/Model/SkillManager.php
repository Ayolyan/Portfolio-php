<?php

namespace Model;


use AyolyanFram\Manager;
use Entity\Skill;

abstract class SkillManager extends Manager {

    /**
     * Method which add a skill in database.
     * @param Skill $skill
     * @return void
     */
    abstract protected function add(Skill $skill);

    /**
     * Method which return the total number of skills.
     * @return int
     */
    abstract public function count();

    /**
     * Method which delete a skill in database
     * @param $id
     * @return void
     */
    abstract public function delete($id);

    /**
     * Method which return the skill which correspond to the id
     * @param int $id The id of the skill in database
     * @return Skill
     */
    abstract public function get($id);

    /**
     * Method which return a list of skills.
     * @param int $start First item to select
     * @param int $limit Items number to select
     * @return array The list of skills. Each entry is an instance of Skill.
     */
    abstract public function getList($start = -1, $limit = -1);

    /**
     * @param int $catId
     * @param int $limit Items number to select
     * @return array The list of skills.
     */
    abstract public function getListFromCat($catId, $limit = -1);

    /**
     * @param Skill $skill
     * @return mixed
     */
    abstract protected function modify(Skill $skill);

    /**
     * Method which register a skill.
     * @param Skill $skill The skill to register.
     * @return void
     */
    public function save(Skill $skill) {
        if ($skill->isValid()) {
            $skill->isNew() ? $this->add($skill) : $this->modify($skill);
        } else {
            throw new \RuntimeException('La compétence doit être validée pour être enregistrée');
        }
    }

}