<?php 

class BaseControlller
{

    /**
     * @var App
     */
    public $app;

    /**
     * BaseControlller constructor.
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
    }
}