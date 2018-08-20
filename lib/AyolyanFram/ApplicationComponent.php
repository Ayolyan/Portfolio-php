<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 12/08/2018
 * Time: 17:16
 */

namespace AyolyanFram;


abstract class ApplicationComponent {

    protected $app;

    public function __construct(Application $app) {
        $this->app = $app;
    }

    /**
     * @return Application
     */
    public function getApp() {
        return $this->app;
    }

}