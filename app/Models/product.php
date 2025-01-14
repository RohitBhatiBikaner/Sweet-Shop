<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $fillable=['name','flavour','description','main_image'];//we need to make it fillable before saving info in database
    public function price(){
       return $this->hasMany(price::class);
    }
    public function media(){
       return $this->hasMany(media::class);
    }
}
