<?php 

define('DS', DIRECTORY_SEPARATOR);

class App 
{

	/**
	 * @var array
	 */
	private $_loadedViews = [];

	/**
	 * @var array
	 */
	private $_loadedControllers = [];

	/**
	 * @var BaseControlller
	 */
	private $_baseController;

	/**
	 * App constructor.
	 */
	public function __construct()
	{

	}

	/**
	 * @param string      $className
	 * @param string $route
	 * @return mixed
	 */
	public function classLoader($className, $route = '')
	{
		$fileName = $route .DS . $className.".php";

		if (!file_exists($fileName)) {
			echo "Class $fileName does not exist";
		}

		require_once $fileName;

		return new $className($this);
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

		$controller = $this->getBaseController();
		$controllerName = ucfirst($controllerName)."Controller";
		
		return $controller->loadController($controllerName);
	}

	/**
	 *
	 */
	public function run()
	{
		echo $this->loadController()->loadMainView();
	}

}