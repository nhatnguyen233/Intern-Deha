<?php

namespace App\Models;

use Cron\AbstractField;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['cat_name'];
    protected $dates = ['delete_at'];
    use SoftDeletes;

    /**
     * Relationship: HasMany (category, product)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'cat_id', 'id');
    }
}
