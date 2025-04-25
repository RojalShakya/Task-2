<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function index(){


        $users=User::wherenot('email','admin@admin.com')->with('roles')->get();
        $roles=Role::all();
        return view('admin.index',compact('users','roles'),[
        ]
    );

    }
    public function assignRole(User $user,Request $request){
        $user->roles()->sync($request->roles);
        Session::flash('message','Roles Updated');
        return redirect()->back();
        // dd($request->all(),$user);

    }


    public function userindex(){
        return view('admin.userdashboard');
    }
    public function verification(){
        return view('admin.unverified');
    }
    // public function updateStatus(Request $request)
    // {
    //     $user=User::findOrFail($request->id);

    //     $user->update(['status' => $request->status]);

    //     return redirect()->route('dashboard')->with('success', 'User status updated successfully.');
    // }

}
