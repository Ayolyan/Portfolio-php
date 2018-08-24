<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 24/08/2018
 * Time: 14:56
 */

namespace App\Backend\Modules\Connexion;

use \AyolyanFram\BackController;
use AyolyanFram\HTTPRequest;

class ConnexionController extends BackController {

    public function executeIndex(HTTPRequest $request) {
        $this->page->addVar('title', 'Connexion');

        if ($request->postExists('login')) {
            $login = $request->postData('login');
            $password = $request->postData('password');

            if ($login == $this->app->getConfig()->get('login') && $password == $this->app->getConfig()->get('pass')) {
                $this->app->getUser()->setAuthenticated(true);
                $this->app->getHttpResponse()->redirect('.');
            } else {
                $this->app->getUser()->setFlash('Le pseudo ou le mot de passe est incorrect.');
            }
        }
    }

}