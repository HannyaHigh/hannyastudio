<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\galeria;
use App\Models\servicio;
use Session;

class GaleriaController extends Controller
{
    public function modificagaleria($idgaleria)
    {
        $consulta = galeria::withTrashed()->join('servicios', 'galerias.idservicio', '=', 'servicios.idservicio')
            ->select('galerias.idgaleria', 'servicios.servicio as servicio', 'galerias.descripcion')
            ->where('idgaleria', $idgaleria)
            ->get();
        $servicio = servicio::all();
        return view('modificagaleria')
            ->with('consulta', $consulta[0])
            ->with('servicio', $servicio);
    }
    public function guardacambiogaleria(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|regex:/^[A-Z, a-z][A-Z,a-z, , á,é,í,ó,ú,Ü]+$/',
        ]);

        $galeria = galeria::withTrashed()->find($request->idgaleria);
        $galeria->idgaleria = $request->idgaleria;
        $galeria->idservicio = $request->idservicio;
        $galeria->descripcion = $request->descripcion;
        $galeria->save();

        /*return view('mensajes')
		->with('proceso',"Modifica de servicio")
		->with('mensaje',"El Servicio ha sido modificado")
		->with('error',1);*/
        Session::flash('mensaje', "La Galeria $request->servicio ha sido modificado correctamente");
        return redirect()->route('reportegaleria');
    }

    public function borragaleria($idgaleria)
    {
        $buscagaleria = galeria::where('idgaleria', $idgaleria)->get();
        $cuantos = count($buscagaleria);
        if ($cuantos == 0) {

            $galeria = galeria::withTrashed()->find($idgaleria)->forceDelete();
            /*return view('mensajes')
		->with('proceso',"Borrar galeria")
		->with('mensaje',"El galeria ha sido borrado correctamente")
		->with('error',1);*/
            Session::flash('mensaje', "La Galeria ha sido eliminado correctamente");
            return redirect()->route('reportegaleria');
        } else {
            /*return view('mensajes')
			->with('proceso',"Borrar Servicio")
			->with('mensaje',"El servicio no se puede eliminar, ya que tiene registros de galeria")
			->with('error',0);^*/
            Session::flash('mensaje', "La Galeria no se puede eliminar");
            return redirect()->route('reportegaleria');
        }
    }
    public function activargaleria($idgaleria)
    {
        $galeria = galeria::withTrashed()->where('idgaleria', $idgaleria)->restore();
        /*return view('mensajes')
			->with('proceso',"Ativar galeria")
			->with('mensaje',"El galeria ha sido activado correctamente")
			->with('error',1);*/
        Session::flash('mensaje', "La galeria ha sido activado correctamente");
        return redirect()->route('reportegaleria');
    }
    public function desactivagaleria($idgaleria)
    {
        $galeria = galeria::find($idgaleria);
        $galeria->delete();
        /*$galeria = galeria::find($idgaleria);
		$galeria->delete();
		/*return view('mensajes')
		->with('proceso',"Desactivar galeria")
		->with('mensaje',"El galeria ha sido desactivado correctamente")
		->with('error',1);*/
        Session::flash('mensaje', "La Galeria ha sido desactivado correctamente");
        return redirect()->route('reportegaleria');
    }

    public function reportegaleria()
    {
        $consulta = galeria::withTrashed()->join('servicios', 'galerias.idservicio', '=', 'servicios.idservicio')
            ->select('galerias.idgaleria','servicios.servicio as servicio', 'galerias.descripcion', 'galerias.deleted_at')

            ->get();
        return view('reportegaleria')->with('consulta', $consulta);
    }


    public function galeria()
    {
        $consulta = galeria::orderBy('idgaleria', 'DESC')
            ->take(1)->get();
        $cuantos = count($consulta);
        if ($cuantos == 0) {
            $idgaleriasigue = 1;
        } else {
            $idgaleriasigue = $consulta[0]->idgaleria + 1;
        }
        $servicio = servicio::orderBy('servicio')->get();
        //return $idgaleriasigue;
        return view('galeria')
            ->with('idgaleriasigue', $idgaleriasigue)
            ->with('servicio', $servicio);
    }
    public function guardargaleria(Request $request)
    {

        //dd($request);
        $request->validate([
            'descripcion' => 'required|regex:/^[A-Z, a-z][A-Z,a-z, , á,é,í,ó,ú,Ü]+$/',
            // 'servicio' => 'required|regex:/^[A-Z, a-z][A-Z,a-z, , á,é,í,ó,ú,Ü]+$/',
        ]);

        $galeria = new galeria;
        $galeria->idgaleria = $request->idgaleria;
        $galeria->descripcion = $request->descripcion;
        // $galeria->servicio = $request->servicio;
        $galeria->idservicio = $request->idservicio;
        $galeria->save();

        /*return view('mensajes')
		->with('proceso', "Alta de Galeria")
		->with('mensaje',"La galeria a sido de alta correctamente");*/
        Session::flash('mensaje', "La galeria $request->foto ha sido dado de alta correctamente");
        return redirect()->route('reportegaleria');
    }


    public function eloquent()
    {
        $consulta = galeria::all();

        //$consulta = galeria::onlyTrashed()->get();

        return $consulta;
        //galeria::withTrashed()->where('idgaleria',7)->restore();
        //return "restauracion realizada";
    }
    public function eloquent2()
    {
        /*$galeria = new galeria;
		$galeria->idgaleria = 7;
		$galeria->foto = "Pruebaas";
		$galeria->descripcion = "Fotos medianas";
		$galeria->idservicio = 2;
		$galeria->save();
		return "Dato guardado Correctamente";*/
        /*$galeria = galeria::find(1);
		$galeria->descripcion = "Fotos Grandes";
		$galeria->save();*/

        $galeria = galeria::find(7);
        $galeria->delete();

        return "eliminacion realizada";
    }
}
