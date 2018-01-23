<?php

namespace Munza\Administrate\Fields;

abstract class BaseField
{
    /**
     * Field label.
     *
     * @var string
     */
    public $label;

    /**
     * Field attribute.
     *
     * @var string
     */
    public $attribute;

    /**
     * Field options.
     *
     * @var array
     */
    public $options = [];

    /**
     * Field value.
     *
     * @var mixed
     */
    public $value;

    /**
     * Field raw value.
     *
     * @var mixed
     */
    public $rawValue;

    /**
     * Field constructor.
     *
     * @param string     $attribute
     * @param array|null $options
     */
    public function __construct(string $attribute, array $options = null)
    {
        $this->attribute = $attribute;
        $this->options   = $this->mergeOptions($options);
        $this->label     = $this->makeLabel();
    }

    /**
     * Render the field.
     *
     * @param  mixed $resource
     * @return string
     */
    public function render($resource = null)
    {
        if (! $this->isRenderable()) {
            return;
        }

        $this->value = $this->getValue($resource);
        $this->rawValue = $this->getValue($resource, true);

        return app('view')->make($this->getTemplatePath())
                          ->with('field', $this)
                          ->render();
    }

    /**
     * Get value of an option.
     *
     * @param  string $key
     * @param  mixed $default
     * @return mixed
     */
    public function getOption(string $key, $default = null)
    {
        if (isset($this->options[$key])) {
            return $this->options[$key];
        }

        return $default;
    }

    /**
     * Get the field value from a given resource object/array.
     *
     * @param  array|object $resource
     * @param  bool|null.   $raw
     * @return mixed
     */
    public function getValue($resource, bool $raw = null)
    {
        switch (true) {
            case is_object($resource):
                return $resource->{$this->getFieldKey()};

            case is_array($resource):
                return $resource[$this->getFieldKey()];

            default:
                return null;
        }
    }

    /**
     * Get attribute field from options and given attribute.
     *
     * @return string
     */
    public function getFieldKey()
    {
        if (isset($this->options['field'])) {
            return $this->options['field'];
        }

        return $this->attribute;
    }

    /**
     * Make label from given value or attribute.
     *
     * @return string
     */
    public function makeLabel()
    {
        return $this->getOption(
            'label',
            ucwords(preg_replace('/_/', ' ', $this->attribute))
        );
    }

    /**
     * Merge given options with default.
     *
     * @param  array|null $options
     * @return array
     */
    private function mergeOptions($options)
    {
        if (! is_array($options)) {
            return $this->options;
        }

        return array_merge($this->options, $options);
    }

    /**
     * Check if the field is renderable.
     *
     * @return boolean
     */
    protected function isRenderable()
    {
        if (isset($this->options['only'])) {
            return in_array($this->getRequestMethod(), $this->options['only']);
        }

        if (isset($this->options['except'])) {
            return !in_array($this->getRequestMethod(), $this->options['except']);
        }

        return true;
    }

    /**
     * Get the field template path.
     *
     * @return string
     */
    protected function getTemplatePath()
    {
        $customViewPath = "admin.fields.{$this->getFieldName()}.{$this->getTemplateName()}";

        if (app('view')->exists($customViewPath)) {
            return $customViewPath;
        }

        $adminViewPath = "administrate::fields.{$this->getFieldName()}.{$this->getTemplateName()}";

        if (app('view')->exists($adminViewPath)) {
            return $adminViewPath;
        }

        return "administrate::fields.default_field.{$this->getTemplateName()}";
    }

    /**
     * Get the field name in snake case.
     *
     * @return string
     */
    private function getFieldName()
    {
        return snake_case(class_basename($this));
    }

    /**
     * Get template name's method part.
     *
     * @return string
     */
    private function getTemplateName()
    {
        $templateName = $this->getRequestMethod();

        if (in_array($templateName, ['create', 'edit'])) {
            $templateName = 'form';
        }

        return $templateName;
    }

    /**
     * Get current request method name.
     *
     * @return string
     */
    private function getRequestMethod()
    {
        return array_last(explode('.', app('router')->currentRouteName()));
    }
}
