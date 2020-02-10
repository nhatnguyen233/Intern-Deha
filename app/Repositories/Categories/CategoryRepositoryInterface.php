<?php

namespace App\Repositories\Categories;

interface CategoryRepositoryInterface
{

    public function countCategory($param);

    public function customQuery($data);

    public function findWithTrashed($id);

    public function getListWithTrashed();

}
