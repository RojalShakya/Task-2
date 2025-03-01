<?php

namespace App\Models;

use GuzzleHttp\Psr7\FnStream;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $guarded=['id'];
    public function child(){
        return $this->hasMany(Category::class,'parent_id');
    }

    public function parent()  {
        return $this->belongsTo(Category::class);
    }

}
