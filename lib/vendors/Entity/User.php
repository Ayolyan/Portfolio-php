<?php
/**
 * Created by PhpStorm.
 * User: yoyan
 * Date: 15/09/2018
 * Time: 21:14
 */

namespace Entity;


use AyolyanFram\Entity;

class User extends Entity {

    protected $name;
    protected $surname;
    protected $pwd;
    protected $status;

    const NAME_INVALID = 1;
    const SURNAME_INVALID = 2;
    const PWD_INVALID = 3;
    const STATUS_INVALID = 4;

    const BASE_STATUS = 1;
    const ADMIN_STATUS = 2;

    public function isValid() {
        return !(empty($this->name) ||  empty($this->surname) || empty($this->pwd) || empty($this->status));
    }

    // ******* //
    // GETTERS //
    // ******* //

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPwd() {
        return $this->pwd;
    }

    /**
     * @return mixed
     */
    public function getSurname() {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getStatus() {
        return $this->status;
    }

    // ******* //
    // SETTERS //
    // ******* //

    /**
     * @param mixed $name
     */
    public function setName($name) {
        if (is_string($name)) {
            $this->name = $name;
        } else {
            throw new \InvalidArgumentException("name argument muss be a String");
        }
    }

    /**
     * @param mixed $pwd
     */
    public function setPwd($pwd) {
        if (is_string($pwd)) {
            $this->pwd = $pwd;
        } else {
            throw new \InvalidArgumentException("pwd argument muss be a string");
        }
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status) {
        if ($status == self::BASE_STATUS || $status ==self::ADMIN_STATUS) {
            $this->status = $status;
        } else {
            throw new \InvalidArgumentException("Nonexistent status");
        }
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname) {
        if (is_string($surname)) {
            $this->surname = $surname;
        } else {
            throw new \InvalidArgumentException("surname argument muss be a String");
        }
    }

}