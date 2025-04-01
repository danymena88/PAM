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
        return redirect('/login');
    }

    public function loginGet()
    {
        return view('auth.authentication-login1');
    }


    public function login(Request $request)
    {
        $modelUser = new User();
        if ($request->post('email') != '' && $request->post('password') != '')
        {
            $user = $modelUser->obtenerPorEmail($request->post('email'));

            if ($user != null) {
                if (Hash::check($request->post('password'), $user->password)) {

                    $request->session()->put('user_id', $user->id);
                    $request->session()->put('primerNombre', $user->primerNombre);
                    $request->session()->put('primerApellido', $user->primerApellido);
                    $request->session()->put('genero', $user->genero);
                    $request->session()->put('sucursal', $modelUser->obtenerSucursal($user->id));
                    $request->session()->put('sucursalId', $user->id_sucursal);
                    $request->session()->put('rol', $user->id_rol_usuarios);
                    $request->session()->put('email', $user->email);
                    
                    Auth::login($user);
                    return redirect('/admin');
                    
                }
                else{
                    return redirect('/login')->with(['resultado' => "incorrecta"]);
                }

            }

            return redirect('/login')->with(['resultado' => "noEncontrado"]);
        }
        else{
            return redirect('/login')->with(['resultado' => "completeCampos"]);
        }
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
