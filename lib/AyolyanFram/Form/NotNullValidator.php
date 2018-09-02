<?php
/**
 * Created by PhpStorm.
 * User: yoyan
 * Date: 27/08/2018
 * Time: 17:24
 */

namespace AyolyanFram\Form;


class NotNullValidator extends Validator {

    public function isValid($value) {
        return $value != '';
    }

}