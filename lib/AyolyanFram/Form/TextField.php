<?php
/**
 * Created by PhpStorm.
 * User: yoyan
 * Date: 27/08/2018
 * Time: 17:03
 */

namespace AyolyanFram\Form;


class TextField extends Field {

    protected $cols;
    protected $rows;

    public function toHtml() {
        $html = '';

        if (!empty($this->errorMessage)) {
            $html .= $this->errorMessage . '<br />';
        }

        $html .= '<label for="' . $this->name . '">' . $this->label . '</label><textarea id="' . $this->name . '" name="' . $this->name . '"';

        if (!empty($this->cols)) {
            $html .= ' cols="' . $this->cols . '"';
        }

        if (!empty($this->rows)) {
            $html .= ' rows="' . $this->rows . '"';
        }

        $html .= '>';

        if (!empty($this->value)) {
            $html .= htmlspecialchars($this->value);
        }

        return $html . '</textarea>';
    }

    /***********/
    /* SETTERS */
    /***********/

    /**
     * @param mixed $cols
     */
    public function setCols($cols) {
        $cols = (int) $cols;

        if ($cols > 0) {
            $this->cols = $cols;
        }
    }

    /**
     * @param mixed $rows
     */
    public function setRows($rows) {
        $rows = (int) $rows;

        if ($rows > 0) {
        $this->rows = $rows;
        }
    }

}