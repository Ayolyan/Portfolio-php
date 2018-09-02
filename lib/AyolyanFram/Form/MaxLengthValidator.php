<?php
/**
 * Created by PhpStorm.
 * User: yoyan
 * Date: 27/08/2018
 * Time: 17:24
 */

namespace AyolyanFram\Form;


class MaxLengthValidator extends Validator {

    protected $maxLength;

    public function __construct($errorMessage, $maxLength) {
        parent::__construct($errorMessage);

        $this->setMaxLength($maxLength);
    }

    public function isValid($value) {
        return strlen($value) <= $this->maxLength;
    }

    /***********/
    /* SETTERS */
    /***********/

    /**
     * @param mixed $maxLength
     */
    public function setMaxLength($maxLength) {
        $maxLength = (int) $maxLength;

        if ($maxLength > 0) {
            $this->maxLength = $maxLength;
        } else {
            throw new \RuntimeException('La longueur maximale doit être un nombre supérieur à 0');
        }
    }

}