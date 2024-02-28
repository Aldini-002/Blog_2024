<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::filter(request(['search']))->orderBy('created_at', 'desc')->paginate(5)->withQueryString();
        return view('users.index', [
            'users' => $users
        ]);
    }


    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return back()->with('success', 'User deleted');
    }
}
