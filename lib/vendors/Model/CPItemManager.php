<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 20/08/2018
 * Time: 16:52
 */

namespace Model;

use \AyolyanFram\Manager;
use Entity\CPItem;

abstract class CPItemManager extends Manager {

    /**
     * Method which add a chines portrait item in database.
     * @param CPItem $CPItem The item to add.
     * @return void
     */
    abstract protected function add(CPItem $CPItem);

    /**
     * Method which return the total number of chinese portrait items.
     * @return int
     */
    abstract public function count();

    /**
     * Method which delete a chinese portrait item in database.
     * @param $id
     * @return void
     */
    abstract public function delete($id);

    /**
     * @param int $id
     * @return CPItem
     */
    abstract public function get($id);

    /**
     * Method which return a list of chinese portrait item
     * @param int $start First item to select
     * @param int $limit Items number to select
     * @return array The list of chinese portrait items. Each entry is an instance of CPItem.
     */
    abstract public function getList($start = -1, $limit = -1);

    /**
     * Method which modify a chinese portrait item.
     * @param CPItem $cpItem
     * @return void
     */
    abstract protected function modify(CPItem $cpItem);

    /**
     * Method which register a chinese portrait item.
     * @param CPItem $cpItem The item to register
     * @return void
     */
    public function save(CPItem $cpItem) {
        if ($cpItem->isValid()) {
            $cpItem->isNew() ? $this->add($cpItem) : $this->modify($cpItem);
        } else {
            throw new \RuntimeException('L\item doit être validée pour être enregistré');
        }
    }



}