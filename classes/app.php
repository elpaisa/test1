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

	private $_baseController;

	/**
	 * App constructor.
	 */
	public function __construct()
	{

	}

	/**
	 * @return BaseController
	 */
	public function getBaseController()
	{
		if (!$this->_baseController) {
			require_once('BaseController.php');
			$this->_baseController = new BaseController($this);
		}

		return $this->_baseController;
	}

	/**
	 * @param string $controllerName
	 * @return mixed
	 */
	public function loadController(string $controllerName)
	{
		if (isset($this->_loadedControllers[$controllerName])) {
			return $this->_loadedControllers[$controllerName];
		}
		
		$controller = $this->getBaseController();
		
		return $controller->loadController();
	}



	public function run()
	{
		echo $this->loadMainView();
	}

}