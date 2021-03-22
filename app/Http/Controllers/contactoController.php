<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contacto;
use Session;

class contactoController extends Controller
{
    public function modificacontacto($idcontacto)
    {
        $consulta = contacto::withTrashed()
            ->where('idcontacto', $idcontacto)
            ->get();
        return view('modificacontacto')
            ->with('consulta', $consulta[0]);
    }

    public function guardarcambiocontacto(Request $request)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'app' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'apm' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'correoc' => 'required|email',
            'mensaje' => 'required|regex:/^[A-Z, a-z][A-Z, , a-z, ,á, é, í, ó, ú]+$/',
        ]);

        $contacto = contacto::withTrashed()->find($request->idcontacto);;
        $contacto->idcontacto = $request->idcontacto;
        $contacto->nombre = $request->nombre;
        $contacto->app = $request->app;
        $contacto->apm = $request->apm;
        $contacto->correoc = $request->correoc;
        $contacto->mensaje = $request->mensaje;
        $contacto->save();

        Session::flash('mensaje', "El contacto de $request->nombre ha sido modificado correctamente");
        return redirect()->route('reportecontacto');
    }

    public function borracontacto($idcontacto)
    {
        $buscacontacto = contacto::where('idcontacto', $idcontacto)->get();
        $cuantos = count($buscacontacto);
        if ($cuantos == 0) {

            $contacto = contacto::withTrashed()->find($idcontacto)->forceDelete();
            Session::flash('mensaje', "El contacto ha sido eliminado correctamente");
            return redirect()->route('reportecontacto');
        } else {
            Session::flash('mensaje', "El contacto no se puede eliminar");
            return redirect()->route('reportecontacto');
        }
    }
    public function activarcontacto($idcontacto)
    {
        $contacto = contacto::withTrashed()->where('idcontacto', $idcontacto)->restore();
        Session::flash('mensaje', "El contacto ha sido activado correctamente");
        return redirect()->route('reportecontacto');
    }

    public function desactivacontacto($idcontacto)
    {
        $contacto = contacto::find($idcontacto);
        $contacto->delete();

        Session::flash('mensaje', "El contacto ha sido desactivado correctamente");
        return redirect()->route('reportecontacto');
    }

    public function reportecontacto()
    {
        $consulta = contacto::withTrashed()->get();
        return view('reportecontacto')->with('consulta', $consulta);
    }

    public function contacto()
    {
        $consulta = contacto::orderBy('idcontacto', 'DESC')
            ->take(1)->get();
        $cuantos = count($consulta);
        if ($cuantos == 0) {
            $idcontactosigue = 1;
        } else {
            $idcontactosigue = $consulta[0]->idcontacto + 1;
        }

        return view('contacto')
            ->with('idcontactosigue', $idcontactosigue);
    }
    public function guardarcontacto(Request $request)
    {

        //dd($request);
        $request->validate([
            'nombre' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'app' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'apm' => 'required|regex:/^[A-Z, a-z][A-Z, a-z, ,á, é, í, ó, ú]+$/',
            'correoc' => 'required|email',
            'mensaje' => 'required|regex:/^[A-Z, a-z][A-Z, , a-z, ,á, é, í, ó, ú]+$/',
        ]);

        $contacto = new contacto;
        $contacto->idcontacto = $request->idcontacto;
        $contacto->nombre = $request->nombre;
        $contacto->app = $request->app;
        $contacto->apm = $request->apm;
        $contacto->correoc = $request->correoc;
        $contacto->mensaje = $request->mensaje;
        $contacto->save();

        Session::flash('mensaje', "El contacto de $request->nombre ha sido dado de alta correctamente");
        return redirect()->route('reportecontacto');
    }
}
