<?php 

class MainController extends BaseController
{
    public $view = 'main';
    
    public $app;
    
    public function __construct($app)
    {
        $this->app = $app;
    }
    
    public function main()
    {
        $getEndPoint = file_get_contents($this->app->baseDir('mock_api_endpoint.json'));
        var_dump($getEndPoint);
        exit;
        $model = $this->baseModel->loadModel($this->view, 1);
    }
}