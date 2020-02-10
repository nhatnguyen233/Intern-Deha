<?php

namespace App\Repositories\General;

interface RepositoryInterface
{
    /**
     * Get al
     * Get all record
     *
     * @return mixed
     */
    public function getAll();

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * Delete
     * Function get data by ID
     *
     * @param $id
     * @return mixed
     */
    public function findById($id);

    /**
     * Delete function
     *
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
