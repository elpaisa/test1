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
     * @var BaseModel
     */
    public $baseModel;

    /**
     * @var mixed
     */
    public $baseView;
    
    /**
     * BaseControlller constructor.
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app           = $app;
        $parentDir = dirname(__FILE__, 1) . DS ;
        $this->controllerDir = $parentDir."controllers";
        $this->viewDir = $parentDir."views";
        $this->baseModel = $this->app->classLoader('BaseModel', $parentDir);
        $this->baseView = $this->app->classLoader('BaseView', $parentDir);
    }

    public function loadController($controllerName)
    {
        return $this->app->classLoader(
            $controllerName, 
            $this->controllerDir
        );
    }

    public function loadMainView()
    {
        $view = $this->baseView->loadView('main');

        return $view->parseView($view, $this->baseModel->getModel('main'));
    }
}