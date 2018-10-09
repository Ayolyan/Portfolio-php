<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 06/10/2018
 * Time: 18:28
 */

namespace App\Backend\Modules\Core;

use AyolyanFram\BackController;
use AyolyanFram\HTTPRequest;

class CoreController extends BackController {

    public function executeIndex(HTTPRequest $request) {
        $this->page->addVar('title', 'Tableau de Bord - Administration');
    }

}