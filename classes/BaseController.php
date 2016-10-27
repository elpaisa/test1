<?php

class BaseController
{

    /**
     * @var App
     */
    public $app;

    /**
     * @var string
     */
    public $controllerDir;

    /**
     * BaseControlller constructor.
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app           = $app;
        $this->controllerDir = dirname(__FILE__, 1);
    }

    public function loadController($controllerName)
    {
        return $this->app->classLoader(
            $controllerName, 
            $this->controllerDir . DS . 'controllers'
        );
    }

    public function loadMainView()
    {
        echo 'bubu';
    }
}