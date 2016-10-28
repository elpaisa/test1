<?php
/**
 * Interface ModelInterface
 *
 * @author John L. Diaz
 */
interface ModelInterface
{
    /**
     * @param array $attributes
     * @return mixed
     */
    public function loadAttributes($attributes);
}