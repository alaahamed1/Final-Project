<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get the user who created the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function create_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'create_user_id', 'id');
    }

    /**
     * Get the user who updated the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function update_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'update_user_id', 'id');
    }
    /**
     * Get the subcategories for the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SubCategory::class);
    }
}
