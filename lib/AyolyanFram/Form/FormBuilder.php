<?php
/**
 * Created by PhpStorm.
 * User: yoyan
 * Date: 27/08/2018
 * Time: 17:41
 */

namespace AyolyanFram\Form;


use AyolyanFram\Entity;

abstract class FormBuilder {

    protected $form;

    public function __construct(Entity $entity) {
        $this->setForm(new Form($entity));
    }

    abstract public function build();

    /***********/
    /* GETTERS */
    /***********/

    /**
     * @return Form
     */
    public function getForm() {
        return $this->form;
    }

    /***********/
    /* SETTERS */
    /***********/

    /**
     * @param Form $form
     */
    public function setForm(Form $form) {
        $this->form = $form;
    }

}