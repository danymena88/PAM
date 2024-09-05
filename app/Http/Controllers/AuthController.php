<?php

namespace App\Http\Controllers;

use App\Models\AccesoUsuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        // return redirect('/login');
        return view('welcome');
    }

    public function loginGet()
    {
        return view('auth.authentication-login1');
    }

    public function registerGet()
    {
        return view('auth.authentication-register1');
    }

    public function register(Request $request)
    {
        $newUser = new User();
        $newUser->name = $request->post('name');
        $newUser->email = $request->post('email');
        $newUser->password = Hash::make($request->post('password'));
        $newUser->id_rol = 2;
        $userRegistered = $newUser->crear($newUser);
        return view('auth.authentication-login1');
    }

    public function login(Request $request)
    {
        $modelUser = new User();

        $user = $modelUser->obtenerPorEmail($request->post('email'));

        if ($user != null) {
            if (Hash::check($request->post('password'), $user->password)) {

                $request->session()->put('user_id', $user->id);
                $request->session()->put('primerNombre', $user->primerNombre);
                $request->session()->put('primerApellido', $user->primerApellido);
                $request->session()->put('genero', $user->genero);
                $request->session()->put('sucursal', $modelUser->obtenerSucursal($user->id));
                $request->session()->put('rol', $user->id_rol_usuarios);
                $request->session()->put('email', $user->email);
                
                Auth::login($user);
                return redirect('/admin');
                /* if ($user->id_rol == 1)
                {
                    return redirect('/admin');
                }
                else
                {
                    return redirect('/');
                } */
            } 
            
            return redirect('/login')->with(['resultado' => "F"]);

        }

        return redirect('/login')->with(['resultado' => "N"]);
    }

    public function logout(Request $request)
    {

        $request->session()->pull('user_id');
        $request->session()->pull('username');
        $request->session()->pull('rol');
        $request->session()->pull('email');

        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
