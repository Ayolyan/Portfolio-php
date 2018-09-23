<?php
/**
 * Created by PhpStorm.
 * User: yoyan
 * Date: 15/09/2018
 * Time: 21:38
 */

namespace Model;


use AyolyanFram\Manager;
use Entity\User;

abstract class UserManager extends Manager {

    /**
     * Method which add a user in database.
     * @param User $user User to add in database.
     * @return void
     */
    abstract protected function add(User $user);

    /**
     * Method which delete a user in database
     * @param $id
     * @return void
     */
    abstract public function delete($id);

    /**
     * Method which return the user which correspond to the id
     * @param int $id The id of the user in database
     * @return User
     */
    abstract public function get($id);

    /**
     * Method which modify a user in database.
     * @param User $user
     * @return mixed
     */
    abstract protected function modify(User $user);

    /**
     * Method which register a user.
     * @param User $user The skills category to register.
     * @return void
     */
    public function save(User $user) {
        if ($user->isValid()) {
            $user->isNew() ? $this->add($user) : $this->modify($user);
        } else {
            throw new \RuntimeException('L\'utilisateur doit être validée pour être enregistrée');
        }
    }
}