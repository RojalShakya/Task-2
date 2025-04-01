<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded=['id'];

    // protected $appends=['image_url'];
    //  public function getImageUrlAttribute(){
    //      if(!$this->image){
    //          return null;
    //      }
    //      return asset('/storage/products/'. $this->image);
    // }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }

}

