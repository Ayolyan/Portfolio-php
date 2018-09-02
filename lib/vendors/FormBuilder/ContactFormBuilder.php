<?php
/**
 * Created by PhpStorm.
 * User: yoyan
 * Date: 28/08/2018
 * Time: 21:11
 */

namespace FormBuilder;


use AyolyanFram\Form\FormBuilder;
use AyolyanFram\Form\StringField;
use AyolyanFram\Form\TextField;

class ContactFormBuilder extends FormBuilder {

    public function build() {
        $this->form->add(new StringField([
                'label'       => 'Nom <span>*</span>',
                'name'        => 'surname',
                'placeholder' => 'Votre nom',
                'required'    => true
            ]))
            ->add(new StringField([
                'label' => 'Prénom <span>*</span>',
                'name' => 'name',
                'placeholder' => 'Votre prénom',
                'required' => true
            ]))
            ->add(new StringField([
                'label' => 'E-mail <span>*</span>',
                'name' => 'email',
                'placeholder' => 'abc@def.xyz',
                'required' => true
            ]))
            ->add(new StringField([
                'label' => 'Sujet',
                'name' => 'subject',
                'placeholder' => 'Le sujet de votre message'
            ]))
            ->add(new TextField([
                'label' => 'Message',
                'name' => 'message',
                'rows' => 10,
                'placeholder' => 'Votre message.',
                'required' => true
            ]))
        ;
    }

}