<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 14/08/2018
 * Time: 22:55
 */

namespace AyolyanFram\Form;


use AyolyanFram\Hydrator;

abstract class Field {

    use Hydrator;

    protected $errorMessage;
    protected $label;
    protected $name;
    protected $validators = [];
    protected $value;

    public function __construct(array $options = []) {
        if (!empty($options)) {
            $this->hydrate($options);
        }
    }

    abstract public function toHtml();

    public function isValid() {
        foreach ($this->validators as $validator) {
            if (!$validator->isValid($this->value)) {
                $this->errorMessage = $validator->getErrorMessage();
                return false;
            }
        }

        return true;
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
     * @return array
     */
    public function getValidators() {
        return $this->validators;
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
     * @param array $validators
     */
    public function setValidators(array $validators) {
        foreach ($validators as $validator) {
            if ($validator instanceof Validator && !in_array($validator, $this->validators)) {
                $this->validators[] = $validator;
            }
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