<?php

namespace App\Repositories\Products;

use App\Repositories\General\RepositoryAbstract;

class ProductRepositoryEloquent extends RepositoryAbstract implements ProductRepositoryInterface
{
    /**
     * Get model product function
     *
     * @return mixed|string
     */
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    public function getAll()
    {
        return $this->model::with('category')
            ->orderBy('id', 'DESC')
            ->paginate(20);
    }

    /**
     * Count quantity
     *
     * @return int
     */
    public function count($param)
    {
        $condition = $this->condition($param);
        return $this->model->where($condition)->count();
    }

    /**
     * Condition function for product
     *
     * @param $keyword
     * @return array
     */
    public function condition($keyword)
    {
        $conditions = [];
        if (isset($keyword['id'])) {
            array_push($conditions, ['products.id', '=', $keyword['id']]);
        }
        if (isset($keyword['name'])) {
            array_push($conditions, ['product_name', 'like', '%' . $keyword['name'] . '%']);
        }
        if (isset($keyword['price1'])) {
            array_push($conditions, ['products.price', '>=', intval(str_replace(',', '', $keyword['price1']))]);
        }
        if (isset($keyword['price2'])) {
            array_push($conditions, ['products.price', '<=', intval(str_replace(',', '', $keyword['price2']))]);
        }
        if (isset($keyword['category']) && $keyword['category'] != 0) {
            array_push($conditions, ['products.cat_id', '=', $keyword['category']]);
        }
        if (isset($keyword['category']) && $keyword['category'] == 0) {
            array_push($conditions, ['products.cat_id', '<>', 0]);
        }
        return $conditions;
    }

    /**
     * Get List product
     *
     * @param $params
     * @return mixed
     */
    public function getList($params)
    {
        $conditions = $this->condition($params);
        if ($conditions) {
            $product = $this->model->where($conditions)->orderBy('id', 'DESC')
                 ->paginate(20);
        } else {
            $product = $this->model->with('category')
                ->orderBy('id', 'DESC')
                ->paginate(20);
        }
        return $product;
    }
}
