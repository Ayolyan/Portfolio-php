<?php
/**
 * Created by PhpStorm.
 * User: yoyan
 * Date: 27/08/2018
 * Time: 19:43
 */

namespace AyolyanFram\Form;


use AyolyanFram\HTTPRequest;
use AyolyanFram\Manager;

class FormHandler {

    protected $form;
    protected $manager;
    protected $request;

    public function __construct(Form $form, Manager $manager, HTTPRequest $request) {
        $this->setForm($form);
        $this->setManager($manager);
        $this->setRequest($request);
    }

    public function process() {
        if ($this->request->getMethod() == 'POST' && $this->form->isValid()) {
            $this->manager->save($this->form->getEntity());

            return true;
        }

        return false;
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

    /**
     * @param Manager $manager
     */
    public function setManager(Manager $manager) {
        $this->manager = $manager;
    }

    /**
     * @param HTTPRequest $request
     */
    public function setRequest(HTTPRequest $request) {
        $this->request = $request;
    }
}