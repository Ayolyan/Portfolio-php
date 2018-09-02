<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 14/08/2018
 * Time: 22:33
 */

namespace AyolyanFram\Form;

use AyolyanFram\Entity;

class Form {

    protected $entity;
    protected $fields = [];

    public function __construct(Entity $entity) {
        $this->setEntity($entity);
    }

    public function add(Field $field) {
        $attr = 'get' . ucfirst($field->getName());
        $field->setValue($this->entity->$attr());

        $this->fields[] = $field;
        return $this;
    }

    public function createView() {
        $view = '';

        foreach ($this->fields as $field) {
            $view .= $field->toHtml() . '<br />';
        }

        return $view;
    }

    public function isValid() {
        $valid = true;

        foreach ($this->fields as $field) {
            if (!$field->isValid()) {
                $valid = false;
            }
        }

        return $valid;
    }

    /***********/
    /* GETTERS */
    /***********/

    /**
     * @return mixed
     */
    public function getEntity() {
        return $this->entity;
    }

    /***********/
    /* SETTERS */
    /***********/

    /**
     * @param mixed $entity
     */
    public function setEntity(Entity $entity) {
        $this->entity = $entity;
    }

}