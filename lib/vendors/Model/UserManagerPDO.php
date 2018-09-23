<?php
/**
 * Created by PhpStorm.
 * User: yoyan
 * Date: 15/09/2018
 * Time: 21:51
 */

namespace Model;


use Entity\User;

class UserManagerPDO extends UserManager {

    protected function add(User $user) {
        $request = $this->dao->prepare('INSERT INTO user(name, surname, status, pwd) VALUES(:name, :surname, :status, :pwd)');

        $request->bindValue(':name',     $user->getName());
        $request->bindValue(':surname',  $user->getSurname());
        $request->bindValue(':status', $user->getStatus());
        $request->bindValue(':pwd',   $user->getPwd());

        $request->execute();
    }

    public function delete($id) {
        $this->dao->exec('DELETE FROM user WHERE id = ' . (int) $id);
    }

    public function get($id) {
        $request = $this->dao->prepare('SELECT id, name, status, pwd FROM user WHERE id=:id');
        $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\User');

        $user = $request->fetch();

        return $user;
    }

    protected function modify(User $user) {
        $request = $this->dao->prepare('UPDATE user SET name = :name, surname = :surname, status = :status, pwd = :pwd WHERE id=:id');

        $request->bindValue(':id', $user->getId(), \PDO::PARAM_INT);
        $request->bindValue(':name', $user->getName());
        $request->bindValue(':surname', $user->getSurname());
        $request->bindValue(':status', $user->getStatus());
        $request->bindValue(':pwd', $user->getPwd());

        $request->execute();
    }

}