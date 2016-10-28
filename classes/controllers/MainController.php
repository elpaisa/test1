<?php 

class MainController extends BaseController implements ControllerInterface
{
    public $view = 'main';

    /**
     * MainController constructor.
     * @param $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }
    
    public function run()
    {
        $baseController = $this->app->getBaseController();
        $getEndPoint = json_decode(file_get_contents($this->app->baseDir.DS.'mock_api_endpoint.json'));
        $model = $baseController->baseModel->loadModel($this->view, $getEndPoint);

        return $baseController->baseView->loadMainView($model);
        
    }
}