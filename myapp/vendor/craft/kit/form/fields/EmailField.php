<?php

namespace craft\kit\form\fields;

use craft\kit\form\Field;

class EmailField extends Field
{

    /**
     * Render input only
     * @return string
     */
    public function input()
    {
        return $this->render(__DIR__ . '/../templates/email.input');
    }

}