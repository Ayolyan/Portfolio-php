<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 13/08/2018
 * Time: 00:18
 */

namespace AyolyanFram;


abstract class Manager {

    protected $dao;

    public function __construct($dao) {
        $this->dao = $dao;
    }

}