<?php
/**
 * Class BaseView
 * 
 * @author John L. Diaz
 */
class BaseView extends BaseController
{

    /**
     * @var App
     */
    public $app;

    /**
     * @var string
     */
    public $viewDir;

    /**
     * BaseModel constructor.
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app     = $app;
        $parentDir     = dirname(__FILE__, 1) . DS;
        $this->viewDir = $parentDir . "views";
    }

    /**
     * @param $view
     * @return mixed
     */
    public function loadView($view): string
    {

        $fileName = $this->viewDir . DS . "$view.html";

        if (!file_exists($fileName)) {
            echo "View $fileName does not exist";
            exit;
        }

        return file_get_contents($fileName);

    }

    /**
     * @param $view
     * @param $model
     * @return string
     */
    public function parseView($view, $model): string
    {

        foreach ($model as $key => $attr) {
            if (is_object($attr) || is_array($attr)) {
                $attributes = $attr;
                $view       = $this->parseView($view, $attributes);
            } else {
                if (is_int($key)) {
                    $attributeName = "$key";
                } else {
                    preg_match_all('/((?:^|[A-Z])[a-z]+)/', $key, $matches);
                    $attributeName = ucwords(implode($matches[0], " "));
                }

                $view = str_replace("{{" . $key . "}}", "<strong>$attributeName:</strong> <span>$attr</span>", $view);
            }
        }

        return $view;
    }

    /**
     * @param Object $model
     * @return string
     */
    public function loadMainView($model): string
    {
        return $this->parseView($this->loadView('main'), $model);
    }
}