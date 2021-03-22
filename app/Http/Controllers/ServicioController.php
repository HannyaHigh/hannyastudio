<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\servicio;
use App\Models\galeria;
use Session;

class ServicioController extends Controller
{

    public function modificaservicio($idservicio)
    {
        $consulta = servicio::withTrashed()
            ->where('idservicio', $idservicio)
            ->get();
        return view('modificaservicio')
            ->with('consulta', $consulta[0]);
    }
    public function guardacambioservicio(Request $request)
    {
        $request->validate([
            'servicio' => 'required|regex:/^[A-Z, a-z][A-Z,a-z, , á,é,í,ó,ú,Ü]+$/',
            'descripcion' => 'required|regex:/^[A-Z, a-z, 0-9][A-Z,a-z, , á,é,í,ó,ú,Ü]+$/',
            'costo' => 'required|regex:/^[0-9]+[.][0-9]{2}$/',
            'reparacion' => 'required|regex:/^[A-Z, a-z][A-Z,a-z, , á,é,í,ó,ú,Ü, 0-9]+$/',
            'conversion' => 'required|regex:/^[A-Z, a-z, 0-9][A-Z,a-z, , á,é,í,ó,ú,Ü]+$/',
            'impresion' => 'required|regex:/^[A-Z, a-z][A-Z,a-z, , á,é,í,ó,ú,Ü]+$/',
            'enmarcados' => 'required|regex:/^[A-Z, a-z][A-Z,a-z, , á,é,í,ó,ú,Ü]+$/',
            'img' => 'image|mimes:gif,jpeg,png'
        ]);
        $file = $request->file('img');
        if ($file <> "") {
            $img = $file->getClientOriginalName();
            $img2 = $request->idservicio . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        }

        $servicio = servicio::withTrashed()->find($request->idservicio);
        $servicio->idservicio = $request->idservicio;
        $servicio->servicio = $request->servicio;
        $servicio->descripcion = $request->descripcion;
        $servicio->costo = $request->costo;
        $servicio->reparacion = $request->reparacion;
        $servicio->conversion = $request->conversion;
        $servicio->impresion = $request->impresion;
        $servicio->enmarcados = $request->enmarcados;
        if ($file <> "") {
            $servicio->img = $img2;
        }
        $servicio->save();

        /*return view('mensajes')
		->with('proceso',"Modifica de servicio")
		->with('mensaje',"El Servicio ha sido modificado")
		->with('error',1);*/
        Session::flash('mensaje', "El Servicio $request->servicio ha sido modificado correctamente");
        return redirect()->route('reporteservicio');
    }

    public function borraservicio($idservicio)
    {
        $buscaservicio = galeria::where('idservicio', $idservicio)->get();
        $cuantos = count($buscaservicio);
        if ($cuantos == 0) {

            $servicio = servicio::withTrashed()->find($idservicio)->forceDelete();
            /*return view('mensajes')
		->with('proceso',"Borrar Servicio")
		->with('mensaje',"El servicio ha sido borrado correctamente")
		->with('error',1);*/
            Session::flash('mensaje', "El Servicio ha sido eliminado correctamente");
            return redirect()->route('reporteservicio');
        } else {
            /*return view('mensajes')
			->with('proceso',"Borrar Servicio")
			->with('mensaje',"El servicio no se puede eliminar, ya que tiene registros de galeria")
			->with('error',0);^*/
            Session::flash('mensaje', "El Servicio no se puede eliminar");
            return redirect()->route('reporteservicio');
        }
    }
    public function activarservicio($idservicio)
    {
        $servicio = servicio::withTrashed()->where('idservicio', $idservicio)->restore();
        /*return view('mensajes')
			->with('proceso',"Ativar Servicio")
			->with('mensaje',"El servicio ha sido activado correctamente")
			->with('error',1);*/
        Session::flash('mensaje', "El Servicio ha sido activado correctamente");
        return redirect()->route('reporteservicio');
    }
    public function desactivaservicio($idservicio)
    {
        $servicio = servicio::find($idservicio);
        $servicio->delete();
        /*return view('mensajes')
		->with('proceso',"Desactivar Servicio")
		->with('mensaje',"El servicio ha sido desactivado correctamente")
		->with('error',1);*/
        Session::flash('mensaje', "El Servicio ha sido desactivado correctamente");
        return redirect()->route('reporteservicio');
    }

    public function reporteservicio()
    {
        $consulta = servicio::withTrashed()->get();
        return view('reporteservicio')->with('consulta', $consulta);
    }

    public function servicio()
    {
        $consulta = servicio::orderBy('idservicio', 'DESC')
            ->take(1)->get();
        $cuantos = count($consulta);
        if ($cuantos == 0) {
            $idserviciosigue = 1;
        } else {
            $idserviciosigue = $consulta[0]->idservicio + 1;
        }

        //return $idserviciosigue;
        return view('servicio')
            ->with('idserviciosigue', $idserviciosigue);
    }
    public function guardarservicio(Request $request)
    {
        $request->validate([
            'servicio' => 'required|regex:/^[A-Z, a-z][A-Z,a-z, , á,é,í,ó,ú,Ü]+$/',
            'descripcion' => 'required|regex:/^[A-Z, a-z, 0-9][A-Z,a-z, , á,é,í,ó,ú,Ü]+$/',
            'costo' => 'required|regex:/^[0-9]+[.][0-9]{2}$/',
            'reparacion' => 'required|regex:/^[A-Z, a-z][A-Z,a-z, , á,é,í,ó,ú,Ü, 0-9]+$/',
            'conversion' => 'required|regex:/^[A-Z, a-z, 0-9][A-Z,a-z, , á,é,í,ó,ú,Ü]+$/',
            'impresion' => 'required|regex:/^[A-Z, a-z][A-Z,a-z, , á,é,í,ó,ú,Ü]+$/',
            'enmarcados' => 'required|regex:/^[A-Z, a-z][A-Z,a-z, , á,é,í,ó,ú,Ü]+$/',
            'img' => 'image|mimes:gif,jpeg,png'
        ]);
        $file = $request->file('img');
        if ($file <> "") {
            $img = $file->getClientOriginalName();
            $img2 = $request->idservicio . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        } else {
            $img2 = "sinfoto.jpg";
        }

        $servicio = new servicio;
        $servicio->idservicio = $request->idservicio;
        $servicio->servicio = $request->servicio;
        $servicio->descripcion = $request->descripcion;
        $servicio->costo = $request->costo;
        $servicio->reparacion = $request->reparacion;
        $servicio->conversion = $request->conversion;
        $servicio->impresion = $request->impresion;
        $servicio->enmarcados = $request->enmarcados;
        $servicio->img = $img2;
        $servicio->save();

        Session::flash('mensaje', "El Servicio $request->servicio ha sido dado de alta correctamente");
        return redirect()->route('reporteservicio');
    }
    public function eloquent3()
    {
        $consulta = servicio::all();
        return $consulta;
    }
    public function eloquent4()
    {
        $servicio = new servicio;
        $servicio->idservicio = 6;
        $servicio->servicio = "Fotos";
        $servicio->descripcion = "Fotos medianas";
        $servicio->costo = 1500;
        $servicio->save();
        return "Dato guardado Correctamente";
    }
}
