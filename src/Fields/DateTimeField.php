<?php

namespace Munza\Administrate\Fields;

use Carbon\Carbon;

class DateTimeField extends BaseField
{
    /**
     * Field default options.
     *
     * @var array
     */
    public $options = [
        'format' => 'M d, Y H:i:s',
    ];

    /**
     * Get the field value from a given resource object/array.
     *
     * @param  array|object $resource
     * @param  bool|null.   $raw
     * @return mixed
     */
    public function getValue($resource, bool $raw = null)
    {
        if (! $value = parent::getValue($resource)) {
            return null;
        }

        if ($raw) {
            return $value;
        }

        if (! $format = $this->options['format']) {
            return $value;
        }

        return Carbon::parse($value)->format($format);
    }
}
