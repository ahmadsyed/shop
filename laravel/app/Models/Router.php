<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softdelete;

class Router extends Model
{
    use softdelete; //delete query will softdelete only on this model
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sapid','hostname', 'loopback', 'mac_address'
    ];

}
