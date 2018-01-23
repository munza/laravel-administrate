<?php

namespace Munza\Administrate\Fields;

use Carbon\Carbon;

class TimeField extends DateTimeField
{
    /**
     * Field default options.
     *
     * @var array
     */
    public $options = [
        'format' => 'H:i:s',
    ];
}
