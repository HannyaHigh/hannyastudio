<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\users;
use App\Models\typeusers;
use App\Models\paysheets;
use Illuminate\Support\Facades\Hash;
//use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Session;

use function PHPSTORM_META\type;

class usuariosController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }

    public function modifyusers($idusuaio)
    {
        $consult = users::withTrashed()->join('typeusers', 'users.idtipoususario', '=', 'typeusers.idtipoususario')
            ->select(
                'users.idusuaio',
                'users.nombre',
                'users.img',
                'users.app',
                'users.apm',
                'users.email',
                'users.celular',
                'users.contraseña',
                'users.sexo',
                'users.ciudad',
                'users.calle',
                'users.nocalle',
                'users.cp',
                //'users.deleted_at',
                'typeusers.tipo as typeuser',
                'users.idtipoususario',
            )
            ->where('idusuaio', $idusuaio)
            ->get();
        $typeusers = typeusers::all();
        return view('modifyusers')
            ->with('consult', $consult[0])
            ->with('typeusers', $typeusers);
    }

    public function savechanges(Request $request)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'app' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'apm' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'email' => 'required|email',
            'contraseña' => 'required|regex:/^[0-9]{12}$/',
            'celular' => 'required|regex:/^[0-9]{10}$/',
            'ciudad' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú, ,]+$/',
            'calle' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'nocalle' => 'required|regex:/^[0-9]+$/',
            'cp' => 'required|regex:/^[0-9]+$/',
            'img' => 'image|mimes:jpeg,png',

            //'g-recaptcha-response' => 'required|captcha',
        ]);

        $file = $request->file('img');
        if($file<>""){
            $img = $file->getClientOriginalName();
            $img2 = $request->idusuaio . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        }
        // else{
        //     $img2 = "sinfoto.jpg";
        // }

        $users = users::withTrashed()->find($request->idusuaio);
        $users->idusuaio = $request->idusuaio;
        $users->nombre = $request->nombre;
        if($file<>""){
            $users->img = $img2;
        }
        $users->app = $request->app;
        $users->apm = $request->apm;
        $users->email = $request->email;
        $users->contraseña = $request->contraseña;
        $users->sexo = $request->sexo;
        $users->celular = $request->celular;
        $users->ciudad = $request->ciudad;
        $users->calle = $request->calle;
        $users->nocalle = $request->nocalle;
        $users->cp = $request->cp;
        $users->idtipoususario = $request->idtipoususario;
        $users->save();
        // echo "Datos modificados exitosamente";
        // return "operacion realizada";
        Session::flash('mensaje', "El empleado $request->nombre $request->app $request->apm
            ha sido modificado correctamente");
        return redirect()->route('usersreports');
    }


    // public function eloquent(){
    //     $consulta = users::all();
    //     return $consulta;
    // }
    public function blockusers($idusuaio)
    {
        $users = users::find($idusuaio);
        $users->delete();
        Session::flash('mensaje', "El empleado ha sido bloqueado de manera satisfactoria");
        return redirect()->route('usersreports');
    }

    public function reactiveusers($idusuaio)
    {
        $users = users::withTrashed()->where('idusuaio', $idusuaio)->restore();
        Session::flash('mensaje', "El empleado ha sido reactivado de manera satisfactoria");
        return redirect()->route('usersreports');
    }

    public function deleteusers($idusuaio)
    {
        $searchemployee = paysheets::where('idusuaio', $idusuaio)->get();
        $howmany = count($searchemployee);
        if ($howmany == 0) {
            $users = users::withTrashed()->find($idusuaio)->forceDelete();
            Session::flash('mensaje', "El empleado se ha borrado de manera permanente");
            return redirect()->route('usersreports');
        } else {
            Session::flash('mensaje', "El empleado 
            no se puede borrar, debido a que esta en el sistema de nominas");
            return redirect()->route('usersreports');
        }
    }

    public function usersreports()
    {
        $consult = users::withTrashed()->join('typeusers', 'users.idtipoususario', '=', 'typeusers.idtipoususario')
            ->select(
                'users.idusuaio',
                'users.nombre',
                'users.app',
                'users.apm',
                'users.email',
                'users.celular',
                'users.deleted_at',
                'typeusers.tipo as typeuser',
                'users.img'
            )
            ->orderBy('nombre')
            ->get();
        return view('usersreports')->with('consult', $consult);
    }

    public function users()
    {
        $consult = users::orderBy('idusuaio', 'desc')
            ->take(1)->get();
        $many = count($consult);
        if ($many == 0) {
            $nextid = 1;
        } else {
            $nextid = $consult[0]->idusuaio + 1;
        }
        $typeusers = typeusers::orderBy('tipo')->get();
        return view('users')
            ->with('nextid', $nextid)
            ->with('typeusers', $typeusers);
    }

    public function guardarusuarios(Request $request)
    {

        //dd($request);
        $request->validate([
            'nombre' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'app' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'apm' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'email' => 'required|email',
            'contraseña' => 'required|regex:/^[0-9]{5}$/',
            'celular' => 'required|regex:/^[0-9]{10}$/',
            'ciudad' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú, ,]+$/',
            'calle' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'nocalle' => 'required|regex:/^[0-9]+$/',
            'cp' => 'required|regex:/^[0-9]+$/',
            'img' => 'image|mimes:jpeg,png',

            //'g-recaptcha-response' => 'required|captcha',
        ]);
        
        // echo $passwordEncriptado;

        $file = $request->file('img');
        if($file<>""){
            $img = $file->getClientOriginalName();
            $img2 = $request->idusuaio . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        }else{
            $img2 = "sinfoto.jpg";
        }


        $users = new users;
        $users->idusuaio = $request->idusuaio;
        $users->nombre = $request->nombre;
        $users->img = $img2;
        $users->app = $request->app;
        $users->apm = $request->apm;
        $users->email = $request->email;
        // $users->contraseña = $request->contraseña;
        $users->contraseña = Hash::make($request->contraseña);
        $users->sexo = $request->sexo;
        $users->celular = $request->celular;
        $users->ciudad = $request->ciudad;
        $users->calle = $request->calle;
        $users->nocalle = $request->nocalle;
        $users->cp = $request->cp;
        $users->activo = $request->activo;
        $users->idtipoususario = $request->idtipoususario;
        $users->save();
        Session::flash('mensaje', "El empleado $request->nombre $request->app $request->apm
            ha sido dado de alta correctamente");
        return redirect()->route('usersreports');
    }
}
