<?php
/**
 * Created by PhpStorm.
 * User: yoyan
 * Date: 27/08/2018
 * Time: 16:51
 */

namespace AyolyanFram\Form;


use http\Exception\InvalidArgumentException;

class StringField extends Field {

    protected $autocomplete;
    protected $autofocus = false;
    protected $disabled = true;
    protected $maxLength;
    protected $minLength;
    protected $pattern;
    protected $placeholder;
    protected $required = false;
    protected $size;

    public function toHtml() {
        $html = '';

        if (!empty($this->errorMessage)) {
            $html .= $this->errorMessage . '<br />';
        }

        $html .= '<label for="' . $this->name . '">' . $this->label . '</label><input type="text" id="' . $this->name . '" name="' . $this->name . '"';

        if (!empty($this->value)) {
            $html .= ' value"' . htmlspecialchars($this->value) . '"';
        }

        if (!empty($this->placeholder)) {
            $html .= ' placeholder="' . $this->placeholder . '"';
        }

        if (!empty($this->maxLength)) {
            $html .= ' maxlength="' . $this->maxLength . '"';
        }

        if (!empty($this->minLength)) {
            $html .= ' minlength="' . $this->minLength . '"';
        }

        if (!empty($this->size)) {
            $html .= ' size="' . $this->size . '"';
        }

        if (!empty($this->pattern)) {
            $html .= ' pattern="' . $this->pattern . '"';
        }

        if ($this->required) {
            $html .= ' required';
        }

        if ($this->autofocus) {
            $html .= ' autofocus';
        }

        if (!empty($this->autocomplete)) {
            $html .= ' autocomplete="' . $this->autocomplete . '"';
        }

        return $html . ' />';
    }

    /***********/
    /* SETTERS */
    /***********/

    /**
     * @param mixed $autocomplete
     */
    public function setAutocomplete($autocomplete) {
        if ($autocomplete == 'on' || $autocomplete == 'off') {
            $this->autocomplete = $autocomplete;
        } else {
            throw new \UnexpectedValueException('Le paramètre autocomplete ne peut prendre que deux valeurs : "on" ou "off"');
        }
    }

    /**
     * @param mixed $autofocus
     */
    public function setAutofocus($autofocus) {
        $this->autofocus = (bool) $autofocus;
    }

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

    /**
     * @param mixed $minLength
     */
    public function setMinLength($minLength) {
        $minLength = (int) $minLength;
        if ($minLength > 0) {
            $this->minLength = $minLength;
        } else {
            throw new \RuntimeException('La longueur minimale doit être un nombre supérieur à 0');
        }
    }

    /**
     * @param mixed $pattern
     */
    public function setPattern($pattern) {
        if (is_string($pattern)) {
            $this->pattern = $pattern;
        } else {
            throw new \RuntimeException('L\'expression régulière doit être une chaîne de caractère');
        }
    }

    /**
     * @param mixed $placeholder
     */
    public function setPlaceholder($placeholder) {
        if (is_string($placeholder)) {
            $this->placeholder = $placeholder;
        } else {
            throw new \InvalidArgumentException('Le texte à mettre en exemple doit être une chaîne de caractère');
        }
    }

    /**
     * @param mixed $required
     */
    public function setRequired($required) {
        $this->required = (bool) $required;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size) {
        $size = (int) $size;
        if ($size > 0) {
            $this->size = $size;
        } else {
            throw new \RuntimeException('La taille du champ doit être un nombre supérieur à 0');
        }
    }

}