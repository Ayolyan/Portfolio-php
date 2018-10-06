<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 23/08/2018
 * Time: 21:22
 */

namespace App\Frontend\Modules\Core;

use \AyolyanFram\BackController;
use \AyolyanFram\HTTPRequest;
use AyolyanFram\Mail;
use FormBuilder\ContactFormBuilder;
use \NavBuilder\Nav;

class CoreController extends BackController {

    public function executeIndex(HTTPRequest $request) {
        $this->page->addVar('title', 'Yoan Bidet | Portfolio');

        $nav = new Nav('index');
        $this->page->addVar('leftNav', $nav->getLeftNav());
        $this->page->addVar('rightNav', $nav->getRightNav());
    }

    public function executeContact(HTTPRequest $request) {
        $this->page->addVar('title', 'Contact | Yoan Bidet');

        $nav = new Nav('contact');
        $this->page->addVar('leftNav', $nav->getLeftNav());
        $this->page->addVar('rightNav', $nav->getRightNav());

        if ($request->postExists('surname')) {
            $mail = new Mail($request->postData('email'),
                'yoan_bidet@orange.fr',
                $request->postData('message'),
                $request->postData('subject'),
                ['sender' => $request->postData('name') . $request->postData('surname'),
                    'priority' => Mail::MAX_PRIORITY
                ]
            );
            $mail->send();
            $this->app->getUser()->setFlash("");
            $this->page->addVar("flashInfo", $this->app->getUser()->getFlash());
        }
    }

    public function executeProfile(HTTPRequest $request) {
        $this->page->addVar('title', 'Profil | Yoan Bidet');

        $nav = new Nav('profile');
        $this->page->addVar('leftNav', $nav->getLeftNav());
        $this->page->addVar('rightNav', $nav->getRightNav());

        // Skills
        $skillManager = $this->managers->getManagerOf('Skill');
        $skillCatManager = $this->managers->getManagerOf('SkillsCat');
        $skillsCats = $skillCatManager->getList();
        $listSkills = [];
        foreach ($skillsCats as $skillsCat) {
            $skills = $skillManager->getListFromCat($skillsCat->getId());
            $listSkills[$skillsCat->getName()] = $skills;
        }
        $this->page->addVar('listSkills', $listSkills);

        // Chinese Portrait
        $nbCPItems = $this->app->getConfig()->get('nb_CPItems');
        $cpItemManager = $this->managers->getManagerOf('CPItem');
        $listCPItems = $cpItemManager->getList(0, $nbCPItems);
        $this->page->addVar('listCPItems', $listCPItems);
    }

}