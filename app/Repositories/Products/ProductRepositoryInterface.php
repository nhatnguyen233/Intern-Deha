<?php

namespace App\Repositories\Products;

interface ProductRepositoryInterface
{
    /**
     * Count function interface;
     *
     * @return mixed
     */
    public function count($param);

    /**
     * Condition function interface
     *
     * @param $keyword
     * @return mixed
     */
    public function condition($keyword);

    /**
     * Get list function interface
     *
     * @param $params
     * @return mixed
     */
    public function getList($params);

}
