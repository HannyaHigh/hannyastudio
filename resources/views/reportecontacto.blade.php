@extends('dashboard')

@section('contenido')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-11">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Reporte de Contactos</h4>
          </div>
          <div class="card-body">
            <a href="{{route('contacto')}}">
              <button type="button" class="btn btn-success ">Alta de Contacto</button></a>
            <br>
            @if(Session::has('mensaje'))
            <div class="alert alert-success">{{Session::get('mensaje')}} </div>
            @endif
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                  <th>
                    <center>Clave Contacto</center>
                  </th>
                  <th>
                    <center>Nombre</center>
                  </th>
                  <th>
                    <center>Apellido Paterno</center>
                  </th>
                  <th>
                    <center>Apellido Materno</center>
                  </th>
                  <th>
                    <center>Correo</center>
                  </th>
                  <th>
                    <center>Mensaje</center>
                  </th>
                  <th>
                    <center>Operaciones</center>
                  </th>
                </thead>
                <tbody>
                  @foreach($consulta as $c)
                  <tr>
                    <td>
                      <center>{{$c->idcontacto}}</center>
                    </td>
                    <td>
                      <center>{{$c->nombre}}</center>
                    </td>
                    <td>
                      <center>{{$c->app}}</center>
                    </td>
                    <td>
                      <center>{{$c->apm}}</center>
                    </td>
                    <td>
                      <center>{{$c->correoc}}</center>
                    </td>
                    <td>
                      <center>{{$c->mensaje}}</center>
                    </td>
                    <td class="td-actions text-primary">
                      <center>
                        <a href="{{route('modificacontacto',['idcontacto'=>$c->idcontacto])}}">
                          <button type="button" rel="tooltip" title="Modificar" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i></button>
                        </a>
                        @if($c->deleted_at)
                        <a href="{{route('activarcontacto',['idcontacto'=>$c->idcontacto])}}">
                          <button type="button" rel="tooltip" title="Activar" class="btn btn-success btn-link btn-sm">
                            <i class="material-icons">visibility</i></button>
                        </a>
                        <a href="{{route('borracontacto',['idcontacto'=>$c->idcontacto])}}">
                          <button type="button" rel="tooltip" title="Borrar" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">delete_forever</i></button>
                          </button>
                        </a>
                        @else
                        <a href="{{route('desactivacontacto',['idcontacto'=>$c->idcontacto])}}">
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