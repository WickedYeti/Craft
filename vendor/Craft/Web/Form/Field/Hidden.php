<?php

/**
 * This file is part of the Craft package.
 *
 * Copyright Aymeric Assier <aymeric.assier@gmail.com>
 *
 * For the full copyright and license information, please view the Licence.txt
 * file that was distributed with this source code.
 */
namespace Craft\Web\Form\Field;

use Craft\View\Engine;
use Craft\Web\Form\Field;

class Hidden extends Field
{

    /**
     * Init field
     * @param string $name
     * @param string $value
     * @param string $id
     */
    public function __construct($name, $value = null, $id = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->id = $id ?: $name . '_' . uniqid();
    }

    /**
     * Render input
     * @return string
     */
    public function input()
    {
        return Engine::make(dirname(__DIR__) . '/templates/hidden.input', ['field' => $this]);
    }


    /**
     * Nothing
     * @return null
     */
    public function label() { return null; }
    public function helper() { return null; }

} 