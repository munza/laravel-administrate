<?php

namespace Munza\Administrate\Traits;

use Illuminate\Http\Request;

trait ResourcefulMethods
{
    /**
     * Render collection.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = $this->getCollection();

        return view($this->getTemplatePath('index'), compact('collection'));
    }

    /**
     * Render resource creation form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->getTemplatePath('create'));
    }

    /**
     * Create a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! $this->getModel()->create($request->all())) {

        }

        return redirect($this->getDashboard()->route('index'));
    }

    /**
     * Render a resource details.
     *
     * @param  int                       $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resource = $this->findResource($id);

        return view($this->getTemplatePath('show'), compact('resource'));
    }

    /**
     * Show a resource edit form.
     *
     * @param  int                       $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resource = $this->findResource($id);

        return view($this->getTemplatePath('edit'), compact('resource'));
    }

    /**
     * Update a resource.
     *
     * @param  Request                   $request
     * @param  int                       $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Delete a resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get the collection.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCollection()
    {
        return $this->getModel()->all();
    }

    /**
     * Get a resource by id.
     *
     * @param  int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findResource($id)
    {
        return $this->getModel()->findOrFail($id);
    }

    /**
     * Get the model instanace.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function getModel()
    {
        $model = $this->model();

        return new $model;
    }

    /**
     * Get the template path to render views.
     *
     * @param  string $method
     * @return string
     */
    private function getTemplatePath(string $method)
    {
        $resource = property_exists($this, 'template') && $this->template
            ? $this->template
            : $this->getResourceName();

        if ($view = app('view')->exists("admin.{$resource}.{$method}")) {
            return $view;
        }

        return "administrate::dashboard.{$method}";
    }

    /**
     * Get the resource name in snake case.
     *
     * @return string
     */
    private function getResourceName()
    {
        return snake_case(preg_replace('/Controller$/', '', class_basename($this)));
    }
}
