<?php

namespace Munza\Administrate\Traits;

trait DashboardMethods
{
    /**
     * Get the dashboard instance.
     *
     * @return \Munza\Administrate\Dashboards\BaseDashboard
     */
    public function getDashboard()
    {
        $dashboard = $this->dashboard();

        return new $dashboard;
    }

    /**
     * Share the dashboard with all the views.
     */
    public function shareDashboardWithView()
    {
        app('view')->share('dashboard', $this->getDashboard());
    }
}
