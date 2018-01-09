<?php

namespace Munza\Administrate\Exceptions;

use Exception;
use Munza\Administrate\Dashboards\BaseDashboard;

class AttributeTypeNotDefined extends Exception
{
    /**
     * AttributeTypeNotDefined constructor.
     *
     * @param string        $attribute
     * @param BaseDashboard $dashboard
     * @return \Exception
     */
    public function __construct(string $attribute, BaseDashboard $dashboard)
    {
        $dashboardName = class_basename($dashboard);
        $message = "{$attribute} attribute is not defined for {$dashboardName}";

        return parent::__construct($message, 500);
    }
}
