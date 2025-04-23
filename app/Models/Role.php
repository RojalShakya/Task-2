<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    //
    protected $guarded=false;
    protected $fillable=['name','slug'];
    public function users():BelongsToMany{
        return $this->belongsToMany(User::class);
    }
    public function permissions():BelongsToMany{
        return $this->belongsToMany(Permission::class);
    }
    protected static function boot(){
        parent::boot();
        static::creating(function($role){
            $role->slug=Str::slug($role->name);
        });
    }
}
