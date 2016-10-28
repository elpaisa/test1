<?php

class MainModel extends BaseModel
{
    
    /**
     * MainModel constructor.
     * @param App   $app
     * @param array $attributes
     */
    public function __construct($app, $attributes = [])
    {
        $this->loadAttributes($attributes);
    }
    
    
}