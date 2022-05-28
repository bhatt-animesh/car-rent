<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $fieldData = $request->all();

        $this->validate($request ,[
            'email' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $fieldData['email'], 'password' => $fieldData['password']))){
            $user = Auth::user();
            if($user->role_id == 1){
                return redirect()->route('agencyhome');
            }else{
                return redirect()->route('customerhome');
            }
        }else {
            return Redirect::back()->withErrors(['msg' => 'Incorrect Email or Password.']);
        }
    }

}
