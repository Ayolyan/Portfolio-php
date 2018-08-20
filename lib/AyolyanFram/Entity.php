<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 13/08/2018
 * Time: 00:21
 */

namespace AyolyanFram;


abstract class Entity implements \ArrayAccess {

    use Hydrator;

    protected $errors = [];
    protected $id;

    public function __construct(array $data = []) {
        if (!empty($data)) {
            $this->hydrate($data);
        }
    }

    public function isNew()
    {
        return empty($this->id);
    }

    public function offsetGet($var) {
        $method = 'get' . ucfirst($var);
        if(isset($this->$var) && is_callable([$this, $method])) {
            return $this->$method();
        }
    }

    public function offsetSet($var, $value) {
        $method = 'set' . ucfirst($var);

        if (isset($this->$var) && is_callable([$this, $method])) {
            $this->$method($value);
        }
    }

    public function offsetExists($var) {
        return isset($this->$var) && is_callable([$this, $var]);
    }

    public function offsetUnset($var) {
        throw new \Exception('Impossible de supprimer une quelconque valeur.');
    }

    /***********/
    /* GETTERS */
    /***********/

    /**
     * @return array
     */
    public function getErrors() {
        return $this->errors;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /***********/
    /* SETTERS */
    /***********/

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $id = (int)$id;

        if ($id >= 0) {
            $this->id = $id;
        } else {
            throw new \InvalidArgumentException('Impossible id value.');
        }
    }

}