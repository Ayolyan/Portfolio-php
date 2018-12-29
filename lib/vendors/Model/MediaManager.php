<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 01/10/2018
 * Time: 20:18
 */

namespace Model;


use AyolyanFram\Manager;
use Entity\Media;

abstract class MediaManager extends Manager {

    /**
     * Method which return the image which correspond to the id
     * @param int $id The id of the image in database
     * @return Media
     */
    abstract public function get($id);

    /**
     * Method which return a list of images which are linked with a gallery item.
     * @param int $id The id of the image in database
     * @param int $start First image to select
     * @param int $limit Images number to select
     * @return array The list of images. Each entry is an instance of Media.
     */
    abstract public function getListFromItem($id, $start = -1, $limit = -1);

}