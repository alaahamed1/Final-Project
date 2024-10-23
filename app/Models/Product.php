<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'price', 'image', 'category_id', 'create_user_id', 'update_user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function createUser()
    {
        return $this->belongsTo(User::class, 'create_user_id');
    }

    public function updateUser()
    {
        return $this->belongsTo(User::class, 'update_user_id');
    }
}