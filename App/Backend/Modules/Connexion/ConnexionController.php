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
            $login = strtolower($request->postData('login'));
            $password = sha1($request->postData('password'));

            $userManager = $this->managers->getManagerOf("User");
            $user = $userManager->getConnexion($login, $password);

            if ($user != null && $user["status"] == "admin") {
                $this->app->getUser()->setAuthenticated(true);
                $this->app->getHttpResponse()->redirect('.');
            } else {
                $this->app->getUser()->setFlash('Le pseudo ou le mot de passe est incorrect.');
            }
        }
    }

}