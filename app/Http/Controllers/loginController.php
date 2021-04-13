<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function main(){
        return view('dahsboard');
    }

    public function validar(Request $request){
        $request->validate([
            'email' => 'required|email',
            'contraseña' => 'required',
        ]);
        // $passwordEncriptado = Hash::make($request->contraseña);
        // echo $passwordEncriptado;

        $consulta = users::where('email', $request->email)
        ->where('activo', 'Si')
        ->get();
        $cuantos = count($consulta);

        if($cuantos==1 and hash::check($request->contraseña, $consulta[0]->contraseña)){
            Session::put('users', $consulta[0]->nombre . '' .$consulta[0]->app);
            Session::put('typeuser', $consulta[0]->idtipoususario);
            Session::put('userid', $consulta[0]->idususario);
            return redirect()->route('dashboard');
        }else{
            //return $consulta;
            Session::flash('mensaje', "El usuario o ontraseña no son correctos");
            return redirect()->route('login');
        }

    }
}
