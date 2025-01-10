<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $fillable=['name','flavour','description','main_image'];//we need to make it fillable before saving info in database
}
