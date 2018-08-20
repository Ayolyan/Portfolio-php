<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 12/08/2018
 * Time: 17:09
 */

namespace AyolyanFram;


abstract class Application {

    protected $config;
    protected $httpRequest;
    protected $httpResponse;
    protected $name;
    protected $user;

    public function __construct() {
        $this->httpRequest = new HTTPRequest($this);
        $this->httpResponse = new HTTPResponse($this);

        $this->name = '';

        $this->config = new Config($this);
        $this->user = new User();
    }

    public function getController() {
        $router = new Router();

        $xml = new \DOMDocument();
        $xml->load(__DIR__ . '/../../App/' . $this->name . '/Config/routes.xml');

        $routes = $xml->getElementsByTagName('route');

        foreach ($routes as $route) {
            $vars = [];

            if ($route->hasAttribute('vars')) {
                $vars = explode(',', $route->getAttribute('vars'));
            }

            $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
        }

        try {
            $matchedRoute = $router->getRoute($this->httpRequest->requestURI());
        } catch (\RuntimeException $e) {
            if ($e->getCode() == Router::NO_ROUTE) {
                $this->httpResponse->redirect404();
            }
        }

        $_GET = array_merge($_GET, $matchedRoute->getVars());

        $controllerClass = 'App\\' . $this->name . '\\Modules\\' . $matchedRoute->getModule() . '\\' . $matchedRoute->getModule() . 'Controller';

        return new $controllerClass($this, $matchedRoute->getModule(), $matchedRoute->getAction());

    }

    abstract public function run();

    /***********/
    /* GETTERS */
    /***********/

    /**
     * @return Config
     */
    public function getConfig() {
        return $this->config;
    }

    /**
     * @return HTTPRequest
     */
    public function getHttpRequest() {
        return $this->httpRequest;
    }

    /**
     * @return HTTPResponse
     */
    public function getHttpResponse() {
        return $this->httpResponse;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return User
     */
    public function getUser() {
        return $this->user;
    }

}