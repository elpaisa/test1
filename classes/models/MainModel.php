<?php

class MainModel extends BaseModel implements ModelInterface
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

        return $this;
    }
}