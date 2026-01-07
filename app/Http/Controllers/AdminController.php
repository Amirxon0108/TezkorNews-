<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebUser;
class AdminController extends Controller
{
    public function showTables(){
        $webUsers=WebUser::all();
        return view('admin.tables', compact('webUsers'));
    }
}
