<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 24/08/2018
 * Time: 14:26
 */

namespace App\Backend;

use AyolyanFram\Application;

class BackendApplication extends Application {

    public function __construct() {
        parent::__construct();

        $this->name = 'Backend';
    }

    public function run() {
        if ($this->user->isAuthenticated()) {
            $controller = $this->getController();
        } else {
            $controller = new Modules\Connexion\ConnexionController($this, 'Connexion', 'index');
        }

        $controller->execute();

        $this->httpResponse->setPage($controller->getPage());
        $this->httpResponse->send();
    }

}