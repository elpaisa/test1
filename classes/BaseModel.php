<?php

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
        $this->app           = $app;
        $this->modelDir = dirname(__FILE__, 1). DS . 'models';
    }

    public function loadModel($modelName, $attributes)
    {

        return $this->app->classLoader(
            ucfirst($modelName),
            $this->modelDir,
            $attributes
        );
    }
    
}