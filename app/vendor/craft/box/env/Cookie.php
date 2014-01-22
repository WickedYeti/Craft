<?php
/**
 * This file is part of the Craft package.
 *
 * Copyright Aymeric Assier <aymeric.assier@gmail.com>
 *
 * For the full copyright and license information, please view the Licence.txt
 * file that was distributed with this source code.
 */
namespace craft\box\env;

use craft\box\data\ArrayProvider;
use craft\box\data\StaticProvider;

abstract class Cookie extends StaticProvider
{

    /**
     * Create provider instance
     * @return ArrayProvider
     */
    protected static function createInstance()
    {
        return new ArrayProvider($_COOKIE);
    }


    /**
     * Set cookie
     * @param string $key
     * @param mixed $value
     * @param int $expire
     * @return $this|void
     */
    public static function set($key, $value, $expire = 0)
    {
        setcookie($key, $value, time() + $expire);
        return parent::set($key, $value);
    }


    /**
     * Drop value to 0
     * @param $key
     * @return bool|void
     */
    public static function drop($key)
    {
        setcookie($key, null);
        return parent::drop($key);
    }

} 