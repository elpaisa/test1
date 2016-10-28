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
        $getEndPoint = json_decode(file_get_contents($this->app->baseDir.DS.'mock_api_endpoint.json'));
        $model = $this->app->getBaseController()->baseModel->loadModel($this->view, $getEndPoint);
        var_dump($model);
    }
}