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

class Select extends Field
{

    /** @var array */
    public $options = [];


    /**
     * Init select
     * @param string $name
     * @param array $options
     * @param string $value
     */
    public function __construct($name, array $options, $value = null)
    {
        $this->name = $name;
        $this->options = $options;
        $this->value = $value;
    }


    /**
     * Render input
     * @return string
     */
    public function input()
    {
        return Engine::make(dirname(__DIR__) . '/templates/select.input', ['field' => $this]);
    }

} 