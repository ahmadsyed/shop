<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','title', 'price', 'user_id'
    ];

}
