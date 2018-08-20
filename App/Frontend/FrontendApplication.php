<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 13/08/2018
 * Time: 17:03
 */

namespace App\Frontend;

use \AyolyanFram\Application;


class FrontendApplication extends Application {

    public function __construct() {
        parent::__construct();

        $this->name = 'Frontend';
    }

    public function run() {
        $controller = $this->getController();
        $controller->execute();

        $this->httpResponse->setPage($controller->getPage());
        $this->httpResponse->send();
    }

}