<?php

define('DS', DIRECTORY_SEPARATOR);
require_once 'ControllerInterface.php';
require_once 'ModelInterface.php';

/**
 * Class App
 *
 * @author John L. Diaz
 */
class App
{
    /**
     * @var array
     */
    private $_loadedControllers = [];

    /**
     * @var BaseControlller
     */
    private $_baseController;

    /**
     * @var string
     */
    public $baseDir;

    /**
     * @var App
     */
    public $app;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->baseDir = dirname(__FILE__, 2);
        $this->app     = $this;
    }

    /**
     * Loads a class using the path, some autoloader can be implemented instead
     *
     * @param string $className
     * @param string $route
     * @param array  $attributes
     * @return mixed
     */
    public function classLoader($className, $route = '', $attributes = [])
    {
        $fileName = $route . DS . $className . ".php";

        if (!file_exists($fileName)) {
            echo "Class $fileName does not exist";
            exit(1);
        }

        require_once $fileName;

        return new $className($this->app, $attributes);
    }

    /**
     * @return BaseController
     */
    public function getBaseController()
    {
        if (!$this->_baseController) {
            $this->_baseController = $this->classLoader('BaseController', dirname(__FILE__));
        }

        return $this->_baseController;
    }

    /**
     * @param string $controllerName
     * @return mixed
     */
    public function loadController(string $controllerName = 'main')
    {
        if (isset($this->_loadedControllers[$controllerName])) {
            return $this->_loadedControllers[$controllerName];
        }

        $controller     = $this->getBaseController();
        $controllerName = ucfirst($controllerName) . "Controller";

        return $controller->loadController($controllerName);
    }

    /**
     * Entry point of the application
     *
     * @return void
     */
    public function run()
    {
        echo $this->loadController()->run();
    }

}