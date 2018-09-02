<?php

namespace Model;


use AyolyanFram\Manager;
use Entity\SkillsCat;

abstract class SkillsCatManager extends Manager {

    /**
     * Method which add a skills category in database
     * @param SkillsCat $skillsCat
     * @return void
     */
    abstract protected function add(SkillsCat $skillsCat);

    /**
     * Method which return the total number of skills categories
     * @return int
     */
    abstract public function count();

    /**
     * Method which delete a skills category in database
     * @param $id
     * @return void
     */
    abstract public function delete($id);

    /**
     * Method which return the skills category which correspond to the id
     * @param int $id The id of the skills category in database
     * @return SkillsCat
     */
    abstract public function get($id);

    /**
     * Method which return a list of skills categories.
     * @param int $start First item to select
     * @param int $limit Items number to select
     * @return array The list of skills categories. Each entry is an instance of SkillsCat.
     */
    abstract public function getList($start = -1, $limit = -1);

    /**
     * @param SkillsCat $skillsCat
     * @return mixed
     */
    abstract protected function modify(SkillsCat $skillsCat);

    /**
     * Method which register a skills category.
     * @param SkillsCat $skillsCat The skills category to register.
     * @return void
     */
    public function save(SkillsCat $skillsCat) {
        if ($skillsCat->isValid()) {
            $skillsCat->isNew() ? $this->add($skillsCat) : $this->modify($skillsCat);
        } else {
            throw new \RuntimeException('La catégorie doit être validée pour être enregistrée');
        }
    }

}