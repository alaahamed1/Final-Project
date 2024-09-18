<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Category
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $create_user_id
 * @property $update_user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @mixin Builder
 */
class Category extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title', 'description', 'create_user_id', 'update_user_id'];


    /**
     * @return BelongsTo
     */
    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'create_user_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function updatedByUser()
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
