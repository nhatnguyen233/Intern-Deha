<?php

namespace App\Repositories\Categories;

use App\Repositories\RepositoryEloquent;
use App\Models\Category;
use App\Repositories\General\RepositoryAbstract;

class CategoryRepositoryEloquent extends RepositoryAbstract implements CategoryRepositoryInterface
{
    /**
     * Override getModel()
     *
     * @return string
     */

    public function getModel()
    {
        return \App\Models\Category::class;
    }

    /**
     * Function Update data with ID
     *
     * @param $input
     * @param $id
     * @return bool
     */
    public function updateCat($input, $id)
    {
        $category = $this->findById($id);
        if ($category) {
            return $category->update($input);
        }
        return false;
    }

    /**
     *  Function get list category
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getList($param)
    {
        $condition = $this->customQuery($param);
        return $this->model->where($condition)->orderBy('id', 'desc')->paginate(10);
    }

    /**
     * Function add Category
     *
     * @param $input
     * @return mixed
     */
    public function add($input)
    {
        if ($input) {
            return $this->model::create($input);
        }
        return false;
    }

    /**
     * Count Category
     *
     * @param $param
     * @return mixed
     */
    public function countCategory($param)
    {
        $condition = $this->customQuery($param);
        return $this->model::where($condition)->count();
    }

    /**
     *  function search data
     * @param $data
     * @return array
     */
    public function customQuery($data)
    {
        $condition = array();

        if (isset($data['id']) && $data['id'] != null) {
            array_push($condition, ['id', '=', $data['id']]);
        }

        if (isset($data['cat_name']) && $data['cat_name'] != null) {
            array_push($condition, ['cat_name', 'like', "%" . $data['cat_name'] . "%"]);
        }

        return $condition;
    }

    /**
     * Function add categories
     *
     * @param $input
     * @return mixed
     */
    public function create(array $input)
    {
        return $categories = $this->model::create($input);
    }

    /**
     * Function delete Category
     *
     * @return bool|null
     * @throws \Exception
     */
    public function deleteCategory($id)
    {
        $category = $this->findById($id);
        return $category->delete();
    }

    /**
     * Find Category by id with all record
     *
     * @param $id
     * @return mixed
     */
    public function findWithTrashed($id)
    {
        return $category = $this->model->withTrashed()
            ->where('id', $id)
            ->first();
    }

    /**
     * List Category with all record
     *
     * @return mixed
     */
    public function getListWithTrashed()
    {
        return $this->model->withTrashed()->get();
    }
}
