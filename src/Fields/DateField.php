<?php

namespace Munza\Administrate\Fields;

use Carbon\Carbon;

class DateField extends DateTimeField
{
    /**
     * Field default options.
     *
     * @var array
     */
    public $options = [
        'format' => 'M d, Y',
    ];
}
