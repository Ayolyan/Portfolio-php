<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 14/08/2018
 * Time: 22:55
 */

namespace AyolyanFram;


class Field {

    use Hydrator;

    protected $errorMessage;
    protected $label;
    protected $name;
    protected $value;

    public function __construct() {

    }

    abstract public function toHtml();

    public function isValid() {

    }

    /***********/
    /* GETTERS */
    /***********/

    /**
     * @return mixed
     */
    public function getLabel() {
        return $this->label;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }

    /***********/
    /* SETTERS */
    /***********/

    /**
     * @param mixed $label
     */
    public function setLabel($label) {
        if (is_string($label)) {
            $this->label = $label;
        }
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        if (is_string($name)) {
            $this->name = $name;
        }
    }

    /**
     * @param mixed $value
     */
    public function setValue($value) {
        if (is_string($value)) {
            $this->value = $value;
        }
    }

}