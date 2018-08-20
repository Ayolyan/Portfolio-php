<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 12/08/2018
 * Time: 17:57
 */

namespace AyolyanFram;


class Route {

    protected $action;
    protected $module;
    protected $url;
    protected $varsNames = [];
    protected $vars = [];

    public function __construct($url, $module, $action, array $varsNames) {
        $this->setURL($url);
        $this->setModule($module);
        $this->setAction($action);
        $this->setVarsNames($varsNames);
    }

    public function hasVars() {
        return !empty($this->varsNames);
    }

    public function match($url) {
        if (preg_match('`^' . $this->url . '$`', $url, $matches)) {
            return $matches;
        } else {
            return false;
        }
    }

    /***********/
    /* GETTERS */
    /***********/

    /**
     * @return mixed
     */
    public function getAction() {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getModule() {
        return $this->module;
    }

    /**
     * @return mixed
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getVars() {
        return $this->vars;
    }

    /**
     * @return array
     */
    public function getVarsNames() {
        return $this->varsNames;
    }

    /***********/
    /* SETTERS */
    /***********/

    /**
     * @param mixed $action
     */
    public function setAction($action) {
        if (is_string($action)) {
            $this->action = $action;
        }
    }

    /**
     * @param mixed $module
     */
    public function setModule($module) {
        if (is_string($module)) {
            $this->module = $module;
        }
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url) {
        if (is_string($url)) {
            $this->url = $url;
        }
    }

    /**
     * @param array $vars
     */
    public function setVars(array $vars)
    {
        $this->vars = $vars;
    }

    /**
     * @param array $varsNames
     */
    public function setVarsNames(array $varsNames)
    {
        $this->varsNames = $varsNames;
    }

}