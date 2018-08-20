<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 14/08/2018
 * Time: 22:28
 */

namespace AyolyanFram;

trait Hydrator {
    public function hydrate(array $data) {
        foreach ($data as $attribute => $value) {
            $method = 'set'.ucfirst($attribute);

            if (is_callable([$this, $method])) {
                $this->$method($value);
            }
        }
    }
}