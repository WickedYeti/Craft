<?php

namespace Craft\Box\Data;

class ArrayCollection extends \ArrayObject implements Provider
{

    /**
     * Check if element exists
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return isset($this[$key]);
    }


    /**
     * Get element by key, fallback on error
     * @param $key
     * @param null $fallback
     * @return mixed
     */
    public function get($key, $fallback = null)
    {
        return isset($this[$key]) ? $this[$key] : $fallback;
    }


    /**
     * Set element by key with value
     * @param $key
     * @param $value
     * @return bool
     */
    public function set($key, $value)
    {
        $this[$key] = $value;
        return true;
    }


    /**
     * Drop element by key
     * @param $key
     * @return bool
     */
    public function drop($key)
    {
        unset($this[$key]);
        return true;
    }


    /**
     * Get first element
     * @return mixed
     */
    public function first()
    {
        return reset($this);
    }


    /**
     * Get first key
     * @return mixed
     */
    public function firstKey()
    {
        reset($this);
        return key($this);
    }


    /**
     * Get last element
     * @return mixed
     */
    public function last()
    {
        return end($this);
    }


    /**
     * Get last element
     * @return mixed
     */
    public function lastKey()
    {
        end($this);
        return key($this);
    }


    /**
     * Count all elements
     * @return int
     */
    public function count()
    {
        return count($this);
    }


    /**
     * Find element and return key
     * @param $value
     * @return mixed
     */
    public function find($value)
    {
        return array_search($value, $this);
    }


    /**
     * Get keys
     * @return array
     */
    public function keys()
    {
        return array_keys($this);
    }


    /**
     * Get values
     * @return array
     */
    public function values()
    {
        return array_values($this);
    }


    /**
     * Push element
     * @param $element
     * @return $this
     */
    public function push($element)
    {
        array_push($this, $element);
        return $this;
    }


    /**
     * Pop element
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this);
    }


    /**
     * Unshift element
     * @param $element
     * @return $this
     */
    public function pushEnd($element)
    {
        array_unshift($this, $element);
        return $this;
    }


    /**
     * Shift element
     * @param $element
     * @return mixed
     */
    public function popEnd($element)
    {
        return array_shift($this);
    }


    /**
     * Insert element
     * @param $element
     * @param $after
     * @return $this
     */
    public function insert($element, $after)
    {
        $before = array_slice($this, 0, $after);
        $after = array_slice($this, $after);
        $before[] = $element;
        $array = array_merge($before, array_values($after));
        $this->exchangeArray($array);
        return $this;
    }


    /**
     * Slice array in many part
     * @param $from
     * @param null $to
     * @return ArrayCollection
     */
    public function slice($from, $to = null)
    {
        $array = array_slice($this, $from, $to, true);
        $this->exchangeArray($array);
        return $this;
    }


    /**
     * Divide array into small arrays
     * @param $size
     * @return array
     */
    public function split($size)
    {
        $chunks = array_chunk($this, $size, true);
        foreach($chunks as $key => $value) {
            $chunks[$key] = new self($value);
        }
        return $chunks;
    }


    /**
     * Apply a callback to all elements
     * @param callable $callback
     * @return $this
     */
    public function map(\Closure $callback)
    {
        $array = array_map($callback, $this);
        $this->exchangeArray($array);
        return $this;
    }


    /**
     * Remove element from callback
     * @param callable $callback
     * @return $this
     */
    public function filter(\Closure $callback)
    {
        $array = array_filter($this, $callback);
        $this->exchangeArray($array);
        return $this;
    }


    /**
     * Clear data
     * @return $this
     */
    public function clear()
    {
        $this->exchangeArray([]);
        return $this;
    }


    /**
     * Get random key(s)
     * @param int $num
     * @return mixed
     */
    public function randKey($num = 1)
    {
        return array_rand($this, $num);
    }


    /**
     * Get random value
     * @param int $num
     * @return array
     */
    public function random($num = 1)
    {
        $rand = array_rand($this, $num);
        if(!is_array($rand)) {
            $rand = [$rand];
        }

        $values = [];
        foreach($rand as $key => $index) {
            $values[$index] = $this[$index];
        }

        return $values;
    }


    /**
     * Mix randomly elements
     * @return mixed
     */
    public function shuffle()
    {
        array_shift($this);
        return $this;
    }


    /**
     * Reverse rows
     * @return $this
     */
    public function upsideDown()
    {
        $array = array_reverse($this, true);
        $this->exchangeArray($array);
        return $this;
    }


    /**
     * Merge with other arrays
     * @param array $array
     * @return $this
     */
    public function merge(array $array)
    {
        $array = array_merge($this, func_get_args());
        $this->exchangeArray($array);
        return $this;
    }


    /**
     * Get column
     * @param $column
     */
    public function column($column)
    {
        // todo
    }

}