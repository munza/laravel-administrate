<?php

namespace Munza\Administrate\Exceptions;

use Exception;
use Munza\Administrate\Dashboards\BaseDashboard;

class DashboardModelNotFound extends Exception
{
    /**
     * DashboardModelNotDefined constructor.
     *
     * @param string        $attribute
     * @param BaseDashboard $dashboard
     * @return \Exception
     */
    public function __construct(string $model, BaseDashboard $dashboard)
    {
        $dashboardName = class_basename($dashboard);
        $message = "{$model} model not found for {$dashboardName}";

        return parent::__construct($message, 500);
    }
}
