<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    //
    protected $fillable = ['name', 'slug', 'groupby'];
    static public function getPermission()
    {
        $getPermission = Permission::groupBy('groupby')->get();
        $result = array();
        foreach ($getPermission as $value) {
            $getPermissionGroup = Permission::getPermissionGroup($value->groupby);
            $data = array();
            $data['id'] = $value->id;
            $data['name'] = $value->name;
            $group = array();

            foreach ($getPermissionGroup as $valueG) {
                $dataG = array();
                $dataG['id'] = $valueG->id;
                $dataG['name'] = $valueG->name;
                $group[] = $dataG;
            }
            $data['group'] = $group;
            $result[] = $data;
        }
        return $result;
    }
    static public function getPermissionGroup($groupby)
    {
        return Permission::where('groupby', '=', $groupby)->get();
    }
    public function roles():BelongsToMany{
        return $this->belongsToMany(Role::class);
    }
}
