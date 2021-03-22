@extends('dashboard')

@section('contenido')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Reporte de Clientes</h4>
          </div>
          <div class="card-body">
            <a href="{{route('cliente')}}">
              <button type="button" class="btn btn-success ">Alta de Cliente</button></a>
            <br>
            @if(Session::has('mensaje'))
            <div class="alert alert-success">{{Session::get('mensaje')}} </div>
            @endif
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                  <th>
                    <center>Foto</center>
                  </th>
                  <th>
                    <center>Clave</center>
                  </th>
                  <th>
                    <center>Nombre</center>
                  </th>
                  <th>
                    <center>Apellido Paterno</center>
                  </th>
                  <th>
                    <center>Sexo</center>
                  </th>
                  <th>
                    <center>Teléfono</center>
                  </th>
                  <th>
                    <center>Correo</center>
                  </th>
                  <th>
                    <center>Operaciones</center>
                  </th>
                </thead>
                <tbody>
                  @foreach($consulta as $c)
                  <tr>
                    <td>
                      @if($c->img == null)
                      <center><img src="{{asset('files/sinfoto.jpg')}}" height="50" width="50"></center>
                      @else
                      <center><img src="{{asset('files/'. $c->img)}}" height="65" width="65"></center>
                      @endif
                    </td>
                    <td>
                      <center>{{$c->idcliente}}</center>
                    </td>
                    <td>
                      <center>{{$c->nombrec}}</center>
                    </td>
                    <td>
                      <center>{{$c->apellidopa}}</center>
                    </td>
                    <td>
                      <center>{{$c->sexo}}</center>
                    </td>
                    <td>
                      <center>{{$c->telefono}}</center>
                    </td>
                    <td>
                      <center>{{$c->correo}}</center>
                    </td>
                    <td class="td-actions text-primary">
                      <center>
                        <a href="{{route('modificacliente',['idcliente'=>$c->idcliente])}}">
                          <button type="button" rel="tooltip" title="Modificar" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i></button>
                        </a>
                        @if($c->deleted_at)
                        <a href="{{route('activarcliente',['idcliente'=>$c->idcliente])}}">
                          <button type="button" rel="tooltip" title="Activar" class="btn btn-success btn-link btn-sm">
                            <i class="material-icons">visibility</i></button>
                        </a>
                        <a href="{{route('borracliente',['idcliente'=>$c->idcliente])}}">
                          <button type="button" rel="tooltip" title="Borrar" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">delete_forever</i></button>
                          </button>
                        </a>
                        @else
                        <a href="{{route('desactivacliente',['idcliente'=>$c->idcliente])}}">
                          <button type="button" rel="tooltip" title="Desactivar" class="btn btn-warning btn-link btn-sm">
                            <i class="material-icons">disabled_by_default</i></button>
                          </button>
                        </a>
                      </center>

                      @endif

                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop