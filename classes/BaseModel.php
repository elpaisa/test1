<?php

/**
 * Class BaseModel
 *
 * @author John L. Diaz
 */
class BaseModel
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
        $this->app      = $app;
        $this->modelDir = dirname(__FILE__, 1) . DS . 'models';
    }

    /**
     * Load a model, this is normal class that is filled with the passed attributes
     * and its respective values.
     *
     * @param string       $modelName
     * @param Object|Array $attributes this is used to fill dynamically the model attributes
     * @return mixed
     */
    public function loadModel($modelName, $attributes)
    {
        return $this->app->classLoader(
            ucfirst($modelName) . "Model",
            $this->modelDir
        )->loadAttributes($attributes);
    }

}