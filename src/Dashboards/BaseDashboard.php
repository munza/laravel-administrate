<?php

namespace Munza\Administrate\Dashboards;

use Munza\Administrate\Exceptions\DashboardModelNotFound;
use Munza\Administrate\Exceptions\AttributeTypeNotDefined;
use Munza\Administrate\Exceptions\DashboardModelNotDefined;

abstract class BaseDashboard
{
    /**
     * Dashboard label.
     *
     * @var string
     */
    public $label;

    /**
     * Resource model.
     *
     * @var string
     */
    public $model;

    /**
     * Dashboard route prefix.
     *
     * @var string
     */
    public $routePrefix;

    /**
     * BaseDashboard constructor.
     */
    public function __construct()
    {
        if(!isset($this->model)) {
            throw new DashboardModelNotDefined($this);
        }

        if (!class_exists($this->model)) {
            throw new DashboardModelNotFound($this->model, $this);
        }

        if (!isset($this->routePrefix)) {
            $this->routePrefix = str_plural($this->getModelName());
        }

        if (!isset($this->label)) {
            $this->label = ucwords(str_replace('_', ' ', $this->getModelName()));
        }
    }

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

    /**
     * Get the model instance of the related resource.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModel()
    {
        return new $this->model;
    }

    private function getModelName()
    {
        return snake_case(strtolower(array_first(explode("::", array_last(explode("\\", $this->model))))));
    }
}
