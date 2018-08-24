<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 12/08/2018
 * Time: 19:23
 */

namespace AyolyanFram;


abstract class BackController extends ApplicationComponent {

    protected $action = '';
    protected $managers = null;
    protected $module = '';
    protected $page = null;
    protected $view = '';

    public function __construct(Application $app, $module, $action) {
        parent::__construct($app);

        $this->managers = new Managers('PDO', PDOFactory::getMysqlConnexion());
        $this->page = new Page($app);

        $this->setAction($action);
        $this->setModule($module);
        $this->setView($action);
    }

    public function execute() {
        $method = 'execute' . ucfirst($this->action);

        if (!is_callable([$this, $method])) {
            throw new \RuntimeException('L\'action "' . $this->action . '" n\'est pas définie sur ce module');
        }

        $this->$method($this->app->getHttpRequest());
    }

    /***********/
    /* GETTERS */
    /***********/

    /**
     * @return Page|null
     */
    public function getPage() {
        return $this->page;
    }

    /***********/
    /* SETTERS */
    /***********/

    /**
     * @param string $action
     */
    public function setAction($action) {
        if (!is_string($action) || empty($action)) {
            throw new \InvalidArgumentException('L\'action doit être une chaine de caractères valide');
        }

        $this->action = $action;
    }

    /**
     * @param string $module
     */
    public function setModule($module) {
        if (!is_string($module) || empty($module)) {
            throw new \InvalidArgumentException('Le module doit être une chaine de caractères valide');
        }

        $this->module = $module;
    }

    /**
     * @param string $view
     */
    public function setView($view) {
        if (!is_string($view) || empty($view)) {
            throw new \InvalidArgumentException('La vue doit être une chaine de caractères valide');
        }

        $this->view = $view;

        $this->page->setContentFile(__DIR__ . '/../../App/' . $this->app->getName() . '/Modules/' . $this->module . '/Views/' . $this->view . 'View.php');
    }

}