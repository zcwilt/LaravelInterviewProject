<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('users', ['users' => User::where('id', '!=', Auth::user()->id)->get()]);
    }
    public function save(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'     => 'required|max:255',
                'email'    => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
            ]
        );

        if ($validator->fails()) {
            return redirect('/users')
                ->withInput()
                ->withErrors($validator);
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/users');

    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect('/users');
    }
}
