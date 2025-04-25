<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\RolePermissionValidation;

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

        $permission=Permission::getPermission();
        $data['role']=Role::findOrFail($id);
        $data['getPermission']=$permission;
        $data['rolePermission']=$data['role']->permissions->pluck('name')->toarray();
        return view('admin.permission.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $role=Role::findOrFail($id);
        $request->validate([
            'name'=>'required',
            Rule::unique('roles')->ignore($role->id),
        ]);
        $role->update($request->all());
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('permission.index');

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
