<?php

namespace Munza\Administrate\Fields;

class BelongsToField extends BaseField
{
    /**
     * Field key.
     *
     * @var string
     */
    public $key;

    /**
     * Field default options.
     *
     * @var array
     */
    public $options = [
        'relationship' => null,
        'pluck' => ['name', 'id'],
        'show' => null,
        'dashboard' => null,
        'key' => 'id',
    ];

    /**
     * {@inheritDoc}
     */
    public function __construct(string $attribute, array $options = null)
    {
        $this->options['relationship'] = $attribute;

        parent::__construct($attribute, $options);

        if (! ends_with($attribute, '_id')) {
            $this->attribute = "{$attribute}_id";
        }
    }

    public function render($resource = null)
    {
        if (! $this->isRenderable()) {
            return;
        }

        $this->value = $this->getValue($resource);
        $this->key = $this->getKey($resource);

        return app('view')->make($this->getTemplatePath())
                          ->with('field', $this)
                          ->render();
    }

    /**
     * Get the field value for the related resource
     * from the resource object/array.
     *
     * @param  array|object $resource
     * @param  bool|null.   $raw
     * @return mixed
     */
    public function getValue($resource, bool $raw = null)
    {
        if (! $this->options['key']) {
            return null;
        }

        if ($raw) {
            return parent::getValue($resource, true);
        }

        if ($key = $this->getAttributeFromRelationship($resource, $this->options['show'])) {
            return $key;
        }

        return null;
    }

    /**
     * Get the key value for the related resource
     * from the resource object/array.
     *
     * @param  array|object $resource
     * @return mixed
     */
    public function getKey($resource)
    {
        if (! $this->options['key']) {
            return null;
        }

        if ($key = $this->getAttributeFromRelationship($resource, $this->options['key'])) {
            return $key;
        }

        return null;
    }

    /**
     * Get the list of resources for select field.
     *
     * @return array
     */
    public function list()
    {
        $dashboard = new $this->options['dashboard'];

        return $dashboard->getModel()
                         ->pluck(...$this->options['pluck']);
    }

    /**
     * Get the related dashboard instance.
     *
     * @return \Munza\Administrate\Dashboards\BaseDashboard
     */
    public function dashboard()
    {
        return new $this->options['dashboard'];
    }

    /**
     * Get the value of the attribute from the model relationship.
     *
     * @param  array|object $resource
     * @param  mixed $key
     * @return mxied
     */
    private function getAttributeFromRelationship($resource, $key = null)
    {
        switch (true) {
            case is_object($resource):
                $model = $resource->{$this->options['relationship']};
                return $key ? $model->{$key} : $model;

            case is_array($resource):
                $model = $resource[$this->options['relationship']];
                return $key ? $model[$key] : $model;

            default:
                return null;
        }
    }
}
