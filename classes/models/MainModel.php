<?php

class MainModel implements ModelInterface
{

    /**
     * @param $attributes
     * @return $this
     */
    public function loadAttributes($attributes)
    {
        if (is_array($attributes) || is_object($attributes)) {
            foreach ($attributes as $key => $value) {
                $this->$key = $value;
            }
        }
        
        if (isset($this->app)) {
            unset($this->app);
        }

        return $this;
    }
}