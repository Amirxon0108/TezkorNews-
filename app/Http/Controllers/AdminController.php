<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebUser;
use App\Models\User;
use App\Models\roles;
class AdminController extends Controller
{
    public function showTables(){
        $webUsers=WebUser::all();
        return view('admin.tables', compact('webUsers'));
    }   
    public function showUsers(){
        $users=User::all();
        return view('admin.users.Users', compact('users'));
    }
    public function editUser($id){
        if(auth()->user()->is_admin()){
        $user=User::findOrFail($id);
        $allRoles = roles::all();
        return view('admin.users.edit-user', compact('user', 'allRoles'));
        } else {
            return redirect()->route('admin.users.Users')->with('error', 'Sizda bu amalni bajarish uchun ruxsat yo\'q.');
        }
    }
    public function updateUser(Request $request, $id)
    {
        if(!auth()->user()->is_admin()){
            return redirect()->route('admin.users.Users')->with('error', 'Sizda bu amalni bajarish uchun ruxsat yo\'q.');
        }
        $user=User::findOrFail($id);
        $user->update([
            'role_id' => $request->input('role_id'),
        ]);
        return redirect()->route('admin.users.Users')->with('success', 'User role updated successfully.');
    }
}
