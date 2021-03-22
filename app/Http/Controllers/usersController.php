<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\users;


class usersController extends Controller
{
    public function eloquent(){
        $consulta = users::all();
        return $consulta;
    }


    public function users(){
        return view('users');
    }

    public function saveusers(Request $request){
        $idusuario = $request->idusuario;
        $nombre = $request->nombre;
        $app = $request->app;
        $apm = $request->apm;
        $email = $request->email;
        $contraseña = $request->contraseña;
        $celular = $request->celular;
        $ciudad = $request->ciudad;
        $calle = $request->calle;
        $nocalle = $request->nocalle;
        $cp = $request->cp;
        //dd($request);
        $this->validate($request, [
            'idusuario' => 'required|regex:/^[A-Z]{3}[-][0-9]{1}$/',
            'nombre' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'app' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'apm' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'email' => 'required|email',
            'contraseña' => 'required',
            'celular' => 'required|regex:/^[0-9]{10}$/',
            'ciudad' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú, ,]+$/',
            'calle' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'nocalle' =>'required|regex:/^[0-9]+$/',
            'cp' =>'required|regex:/^[0-9]+$/',
        ]);

        echo "Datos guardados exitosamente";
    }
}
