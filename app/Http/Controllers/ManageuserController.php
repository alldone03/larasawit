<?php

namespace App\Http\Controllers;

use App\Models\tb_role;
use App\Models\User;
use Illuminate\Http\Request;

class ManageuserController extends Controller
{
    function index()
    {
        $user = User::all();
        return view('Pages.Dashboard.manageuser.index', compact('user'));
    }
    function edit()
    {
        $listrole = tb_role::all();
        return response()->json($listrole);
    }
    function update()
    {
        $id = request('id');
        $user = User::find($id);
        $user->role = request('role');
        $user->save();
        return response()->json($user);
    }
}
