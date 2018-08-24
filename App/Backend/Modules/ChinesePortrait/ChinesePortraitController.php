<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 24/08/2018
 * Time: 15:12
 */

namespace App\Backend\Modules\ChinesePortrait;

use \AyolyanFram\BackController;
use \AyolyanFram\HTTPRequest;
use \Entity\CPItem;

class ChinesePortraitController extends BackController {

    public function executeDelete(HTTPRequest $request) {
        $this->managers->getManagerOf('CPItem')->delete($request->getData('id'));

        $this->app->getUser()->setFlash('La news a bien été supprimée !');

        $this->app->getHttpResponse()->redirect('../../chinesePortrait');
    }

    public function executeIndex(HTTPRequest $request) {
        $this->page->addVar('title', 'Gestion du Portrait Chinois');

        $manager = $this->managers->getManagerOf('CPItem');

        $this->page->addVar('listCPItems', $manager->getList());
        $this->page->addVar('nbCPItems', $manager->count());
    }

    public function executeInsert(HTTPRequest $request) {
        if ($request->postExists('rightText')) {
            $this->processForm($request);
        }

        $this->page->addVar('title', 'Ajout d\'un item au portrait chinois');
    }

    public function executeModify(HTTPRequest $request) {
        if ($request->postExists('rightText')) {
            $this->processForm($request);
        } else {
            $this->page->addVar('cpItem', $this->managers->getManagerOf('CPItem')->get($request->getData('id')));
        }

        $this->page->addVar('title', 'Modification d\un item du portrait chinois');
    }

    public function processForm(HTTPRequest $request) {
        $CPItem = new CPItem([
            'svgLink' => $request->postData('svgLink'),
            'leftText' => $request->postData('leftText'),
            'rightText' => $request->postData('rightText'),
        ]);

        if ($request->postExists('id')) {
            $CPItem->setId($request->postData('id'));
        }

        if ($CPItem->isValid()) {
            $this->managers->getManagerOf('CPItem')->save($CPItem);

            $this->app->getUser()->setFlash($CPItem->isNew() ? 'L\'item a bien été ajouté' : 'L\'item a bien été modifié');
        } else {
            $this->page->addVar('erreurs', $CPItem->getErrors());
        }

        $this->page->addVar('cpItem', $CPItem);
    }

}