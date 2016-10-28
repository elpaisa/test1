<?php

/**
 * Class BaseController
 *
 * @author John L. Diaz
 */
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
     * @var BaseView
     */
    public $baseView;

    /**
     * BaseController constructor.
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app           = $app;
        $parentDir           = dirname(__FILE__, 1) . DS;
        $this->controllerDir = $parentDir . "controllers";
        $this->baseModel     = new BaseModel($this->app);
        $this->baseView      = new BaseView($this->app);
    }

    /**
     * @param $controllerName
     * @return mixed
     */
    public function loadController($controllerName)
    {
        return $this->app->classLoader(
            $controllerName,
            $this->controllerDir
        );

    }
    
}
