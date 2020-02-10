<?php

namespace App\Repositories\General;

use Exception;

abstract class RepositoryAbstract implements RepositoryInterface
{
    protected $model;

    /**
     * Contructor
     *
     * RepositoryAbstract constructor.
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Abstract function get Model
     *
     * @return mixed
     */
    abstract public function getModel();

    /**
     * Set model
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    /**
     * get all record
     *
     * @return array
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Function get data by ID
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attribute
     * @return mixed
     */
    public function create(array $attribute)
    {
        try {
            return $this->model->create($attribute);
        } catch (Exception $e) {
            report($e);

            return false;
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $attribute
     * @param $id
     * @return mixed
     */
    public function update($id, array $attributes)
    {
        $model = $this->model->find($id);
        if ($model) {
            return $model->update($attributes);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $model = $this->model->findById($id);
        if ($model) {
            return $model->delete();
        }
    }

}
