<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Laracasts\Flash\Flash;

class AuthController extends Controller
{
    public function login()
    {
        /*
        $user = new User();
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('password');
        $user->save();
        */
        return View('auth.login');
    }

    public function loginPost(Request $request)
    {
       
        $user = User::where('email',$request->email)->first();
        if(Auth::attempt(['email'=> $request->email, 'password'=> $request->password]))
        {
            return redirect()->route('home');
        }else{
            Flash::error('Usuario o contraseña incorrecta');
            return redirect()->route('login');
        }

        /*
        if(Auth::attempt(['email'=> $request->email, 'password'=> $request->password, 'type'=> 'member']))
        {
            return redirect()->route('login');
        }
        */
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.proyectos.index');
    }
}
