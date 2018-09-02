<?php
/**
 * Created by PhpStorm.
 * User: yoyan
 * Date: 28/08/2018
 * Time: 11:15
 */

namespace AyolyanFram\Form;


class MinLengthValidator extends Validator {

    protected $minLength;

    public function __construct($errorMessage, $minLength) {
        parent::__construct($errorMessage);

        $this->setMinLength($minLength);
    }

    public function isValid($value) {
        return strlen($value) >= $this->minLength;
    }

    /***********/
    /* SETTERS */
    /***********/

    /**
     * @param mixed $maxLength
     */
    public function setMinLength($minLength) {
        $minLength = (int) $minLength;

        if ($minLength > 0) {
            $this->minLength = $minLength;
        } else {
            throw new \RuntimeException('La longueur maximale doit être un nombre supérieur à 0');
        }
    }

}