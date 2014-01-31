<?php

namespace Craft\Box\Data;

interface Provider
{

    /**
     * Check if element exists
     * @param $key
     * @return bool
     */
    public function has($key);

    /**
     * Get element by key, fallback on error
     * @param $key
     * @param null $fallback
     * @return mixed
     */
    public function get($key, $fallback = null);

    /**
     * Set element by key with value
     * @param $key
     * @param $value
     * @return bool
     */
    public function set($key, $value);

    /**
     * Drop element by key
     * @param $key
     * @return bool
     */
    public function drop($key);

} 