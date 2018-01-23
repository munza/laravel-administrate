<?php

namespace Munza\Administrate\Exceptions;

use Exception;
use Munza\Administrate\Dashboards\BaseDashboard;

class DashboardModelNotDefined extends Exception
{
    /**
     * DashboardModelNotDefined constructor.
     *
     * @param string        $attribute
     * @param BaseDashboard $dashboard
     * @return \Exception
     */
    public function __construct(BaseDashboard $dashboard)
    {
        $dashboardName = class_basename($dashboard);
        $message = "model properties not defined for {$dashboardName}";

        return parent::__construct($message, 500);
    }
}
