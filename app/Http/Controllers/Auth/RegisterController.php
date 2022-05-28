<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest');
    }


    public function agency_register()
    {
        return view('auth.agency_register');
    }

    public function customer_register()
    {
        return view('auth.customer_register');
    }

    public function create_user(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);

        $role_id = ($request->role_id == 1) ? '1' : '2';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $role_id,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('agencyhome');
    }
}
