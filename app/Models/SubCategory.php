<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class SubCategory
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $category_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @package App
 * @mixin Builder
 */
class SubCategory extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title', 'description', 'category_id'];


    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }

}
