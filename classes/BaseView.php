<?php

class BaseView extends BaseController
{

    /**
     * @var App
     */
    public $app;

    /**
     * BaseModel constructor.
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app           = $app;
    }

    /**
     * @param $view
     * @return mixed
     */
    public function loadView($view)
    {

        $fileName = $this->app->baseDir.DS."views/$view.html";

        if (!file_exists($fileName)) {
            echo "View $fileName does not exist";
            exit;
        }

        return file_get_contents($fileName);

    }

    /**
     * @param $view
     * @param $model
     */
    public function parseView($view, $model)
    {
        echo $view;

        var_dump($model);
    }

    /**
     * @return mixed
     */
    public function loadMainView()
    {
        $view = $this->baseView->loadView('main');

        return $this->parseView($view,
            $this->app->getBaseController()->baseModel->getModel('main')
        );
    }
}