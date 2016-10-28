<?php

class BaseView extends BaseController
{

    /**
     * @var App
     */
    public $app;

    /**
     * @var string
     */
    public $modelDir;

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
}