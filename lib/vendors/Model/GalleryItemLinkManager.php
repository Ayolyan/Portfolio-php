<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 01/10/2018
 * Time: 15:17
 */

namespace Model;


use AyolyanFram\Manager;
use Entity\GalleryItemLink;

abstract class GalleryItemLinkManager extends Manager {

    /**
     * Method which return the gallery item link which correspond to the id
     * @param int $id The id of the gallery item in database
     * @return GalleryItemLink
     */
    abstract public function get($id);

    /**
     * Method which return a list of gallery item links which are linked with a gallery item.
     * @param int $id The id of the gallery item in database
     * @param int $start First link to select
     * @param int $limit Links number to select
     * @return array The list of gallery item links. Each entry is an instance of GalleryItemLink.
     */
    abstract public function getListFromItem($id, $start = -1, $limit = -1);

}