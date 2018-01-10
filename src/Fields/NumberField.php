<?php

namespace Munza\Administrate\Fields;

class NumberField extends BaseField
{
    /**
     * Field default options.
     *
     * @var array
     */
    public $options = [
        'min' => null,
        'max' => null,
        'precision' => null,
        'mode' => PHP_ROUND_HALF_UP
    ];
}
