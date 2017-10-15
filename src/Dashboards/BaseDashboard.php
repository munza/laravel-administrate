<?php

namespace Munza\Administrate\Dashboards;

use Munza\Administrate\Exceptions\AttributeTypeNotDefined;

abstract class BaseDashboard
{
    /**
     * Dashboard label.
     *
     * @var string
     */
    public $label;

    /**
     * Dashboard route prefix.
     *
     * @var string
     */
    public $routePrefix;

    /**
     * Get a dashboard named route.
     *
     * @param  string     $method
     * @param  array|null $options
     * @return string
     */
    public function route(string $method, $options = null)
    {
        return $options
            ? route("{$this->routePrefix}.{$method}", $options)
            : route("{$this->routePrefix}.{$method}");
    }

    /**
     * Get a field instance.
     *
     * @param  string $attribute
     * @return \Munza\Administrate\Fields\BaseField
     */
    public function field(string $attribute)
    {
        if (! isset($this->attributeTypes()[$attribute])) {
            throw new AttributeTypeNotDefined($attribute, $this);
        }

        $attributeClass = $this->attributeTypes()[$attribute];

        if (is_array($attributeClass)) {
            return new $attributeClass[0](
                $attribute,
                array_slice($attributeClass, 1)[0]
            );
        }

        return new $attributeClass($attribute);
    }
}
