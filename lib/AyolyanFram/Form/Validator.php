<?php
/**
 * Created by PhpStorm.
 * User: yoyan
 * Date: 27/08/2018
 * Time: 17:19
 */

namespace AyolyanFram\Form;


abstract class Validator {

    protected $errorMessage;

    public function __construct($errorMessage) {
        $this->setErrorMessage($errorMessage);
    }

    abstract public function isValid($value);

    /***********/
    /* GETTERS */
    /***********/

    /**
     * @return mixed
     */
    public function getErrorMessage() {
        return $this->errorMessage;
    }

    /***********/
    /* SETTERS */
    /***********/

    /**
     * @param mixed $errorMessage
     */
    public function setErrorMessage($errorMessage) {
        if (is_string($errorMessage)) {
            $this->errorMessage = $errorMessage;
        }
    }

}