<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use Session;

class ClienteController extends Controller
{
    public function modificacliente($idcliente)
    {
        $consulta = cliente::withTrashed()
            ->where('idcliente', $idcliente)
            ->get();
        return view('modificacliente')
            ->with('consulta', $consulta[0]);
    }

    public function guardarcambiocliente(Request $request)
    {
        $request->validate([
            'nombrec' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'apellidopa' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'apellidoma' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'sexo' => 'required',
            'telefono' => 'required|regex:/^[0-9]{10}$/',
            'correo' => 'required|email',
            'contraseña' => 'required',
            'ciudad' => 'required',
            'calle' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'nocalle' => 'required|regex:/^[0-9]{2}$/',
            'CP' => 'required|regex:/^[0-9]{5}$/',
            'img' => 'image|mimes:gif,jpeg,png',
        ]);
        $file = $request->file('img');
        if ($file <> "") {
            $img = $file->getClientOriginalName();
            $img2 = $request->idcliente . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        }

        $cliente = cliente::withTrashed()->find($request->idcliente);
        $cliente->idcliente = $request->idcliente;
        $cliente->nombrec = $request->nombrec;
        $cliente->apellidopa = $request->apellidopa;
        $cliente->apellidoma = $request->apellidoma;
        $cliente->sexo = $request->sexo;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->contraseña = $request->contraseña;
        $cliente->ciudad = $request->ciudad;
        $cliente->calle = $request->calle;
        $cliente->nocalle = $request->nocalle;
        $cliente->CP = $request->CP;
        if ($file <> "") {
            $cliente->img = $img2;
        }
        $cliente->save();

        Session::flash('mensaje', "El cliente $request->nombrec $request->apellidopa ha sido modificado correctamente");
        return redirect()->route('reportecliente');
    }

    public function borracliente($idcliente)
    {
        $buscacliente = cliente::where('idcliente', $idcliente)->get();
        $cuantos = count($buscacliente);
        if ($cuantos == 0) {

            $cliente = cliente::withTrashed()->find($idcliente)->forceDelete();

            Session::flash('mensaje', "El cliente ha sido eliminado correctamente");
            return redirect()->route('reportecliente');
        } else {
            Session::flash('mensaje', "El cliente no se puede eliminar");
            return redirect()->route('reportecliente');
        }
    }
    public function activarcliente($idcliente)
    {
        $cliente = cliente::withTrashed()->where('idcliente', $idcliente)->restore();
        Session::flash('mensaje', "El cliente ha sido activado correctamente");
        return redirect()->route('reportecliente');
    }

    public function desactivacliente($idcliente)
    {
        $cliente = cliente::find($idcliente);
        $cliente->delete();

        Session::flash('mensaje', "El cliente ha sido desactivado correctamente");
        return redirect()->route('reportecliente');
    }

    public function reportecliente()
    {
        $consulta = cliente::withTrashed()->get();
        return view('reportecliente')->with('consulta', $consulta);
    }

    public function cliente()
    {
        $consulta = cliente::orderBy('idcliente', 'DESC')
            ->take(1)->get();
        $cuantos = count($consulta);
        if ($cuantos == 0) {
            $idclientesigue = 1;
        } else {
            $idclientesigue = $consulta[0]->idcliente + 1;
        }

        return view('cliente')
            ->with('idclientesigue', $idclientesigue);
    }
    public function guardarcliente(Request $request)
    {
        $request->validate([
            'nombrec' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'apellidopa' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'apellidoma' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'sexo' => 'required',
            'telefono' => 'required|regex:/^[0-9]{10}$/',
            'correo' => 'required|email',
            'contraseña' => 'required',
            'ciudad' => 'required',
            'calle' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'nocalle' => 'required|regex:/^[0-9]{2}$/',
            'CP' => 'required|regex:/^[0-9]{5}$/',
            'img' => 'image|mimes:gif,jpeg,png',
        ]);
        $file = $request->file('img');
        if ($file <> "") {
            $img = $file->getClientOriginalName();
            $img2 = $request->idcliente . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        } else {
            $img2 = "sinfoto.jpg";
        }

        $cliente = new cliente;
        $cliente->idcliente = $request->idcliente;
        $cliente->nombrec = $request->nombrec;
        $cliente->apellidopa = $request->apellidopa;
        $cliente->apellidoma = $request->apellidoma;
        $cliente->sexo = $request->sexo;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->contraseña = $request->contraseña;
        $cliente->ciudad = $request->ciudad;
        $cliente->calle = $request->calle;
        $cliente->nocalle = $request->nocalle;
        $cliente->CP = $request->CP;
        $cliente->img = $img2;
        $cliente->save();

        Session::flash('mensaje', "El cliente $request->nombrec $request->apellidopa ha sido dado de alta correctamente");
        return redirect()->route('reportecliente');
    }
}
