<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class price extends Model
{
    //
    protected $fillable=['product_id','weight','weight_type','price','madewith'];
}
