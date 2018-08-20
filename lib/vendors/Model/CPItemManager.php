<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 20/08/2018
 * Time: 16:52
 */

namespace Model;

use \AyolyanFram\Manager;

abstract class CPItemManager extends Manager {

    /**
     * Method which return a list of chinese portrait item
     * @param int $start First item to select
     * @param int $limit Items number to select
     * @return array The list of chinese portrait items. Each entry is an instance of CPItem.
     */
    abstract public function getList($start = -1, $limit = -1);
}