<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'id',
        'cat_id',
        'product_name',
        'price',
        'detail'
    ];

    /**
     * Relationship: One to Many between (product, category)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'cat_id', 'id')->withTrashed();
    }
}
