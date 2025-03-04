<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(){
        $users=User::all();


        return view('admin.index',compact('users'));

    }
    public function userindex(){
        return view('admin.userdashboard');
    }
    public function verification(){
        return view('admin.userdashboard');
    }
    public function updateStatus(Request $request)
    {
        $user=User::findOrFail($request->id);

        $user->update(['status' => $request->status]);

        return redirect()->route('dashboard')->with('success', 'User status updated successfully.');
    }
}
