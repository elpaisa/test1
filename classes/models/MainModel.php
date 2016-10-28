<?php
/**
 * Class MainModel
 *
 * @author John L. Diaz
 */
class MainModel implements ModelInterface
{
    /**
     * @param Object $attributes
     * @return MainModel
     */
    public function loadAttributes($attributes): MainModel
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
