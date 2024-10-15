<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactData
 *
 * @property $id
 * @property $first_name
 * @property $last_name
 * @property $email
 * @property $subject
 * @property $message
 * @property $is_replied
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin Builder
 */
class ContactData extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'subject', 'message'];


}
