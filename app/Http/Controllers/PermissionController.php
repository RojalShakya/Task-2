<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolePermissionValidation;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.permission.index',[
           'roles'=>Role::all(),
        ]);

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission=Permission::getPermission();
        $data['getPermission']=$permission;
        return view('admin.permission.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolePermissionValidation $request)
    {

        $role=Role::create([
            'name'=>$request->name
        ]);
        if(isset($request->permission_id)){
            $role->permissions()->sync($request->permission_id);
        }

        return redirect()->back()->with('message');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $role=Role::findOrFail($id);
        $role->delete();

        return redirect()->back();

    }
}
