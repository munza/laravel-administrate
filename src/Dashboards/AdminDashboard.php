<?php

namespace Munza\Administrate\Dashboards;

interface AdminDashboard
{
    /**
     * List of attribute types.
     *
     * @return array
     */
    public function attributeTypes();

    /**
     * List of attributes for index page.
     *
     * @return array
     */
    public function listAttributes();

    /**
     * List of attributes for show page.
     *
     * @return array
     */
    public function showAttributes();

    /**
     * List of attributes for form page.
     *
     * @return array
     */
    public function formAttributes();
}
