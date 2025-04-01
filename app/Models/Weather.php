<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    //
    use HasFactory;
    protected $table='weathers';
    // protected $fillable = ['city','weather','temperature','tomorrow_temp'];
     protected $guarded=false;
     protected $hidden =['created_at','updated_at'];

     public function setWeatherAttribute($value){
        $this->attributes['city']=ucfirst('value');
     }
}
