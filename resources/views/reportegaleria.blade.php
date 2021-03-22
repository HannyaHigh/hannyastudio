@extends('dashboard')

@section('contenido')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Reporte de Galeria:</h4>
          </div>
          <div class="card-body">
            <br>
            <a href="{{route('galeria')}}">
              <button type="button" class="btn btn-success ">Alta de Galeria</button></a>
            <br>
            <br>
            @if(Session::has('mensaje'))
            <div class="alert alert-success">{{Session::get('mensaje')}} </div>
            @endif
            <br>
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                  <tr>
                    <th>
                      <center>Clave</center>
                    </th>
                    <th>
                      <center>Servicio</center>
                    </th>
                    <th>
                      <center>Descripcion</center>
                    </th>
                    <th>
                      <center>Operaciones</center>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($consulta as $c)
                  <tr>
                    <th>
                      <center>{{$c->idgaleria}}</center>
                    </th>
                    <td>
                      <center>{{$c->servicio}}</center>
                    </td>
                    <td>
                      <center>{{$c->descripcion}}</center>
                    </td>
                    <td class="td-actions text-primary">
                      <center>
                        <a href="{{route('modificagaleria',['idgaleria'=>$c->idgaleria])}}">
                          <button type="button" rel="tooltip" title="Modificar" class="btn btn-primary btn-link btn-sm">
                            <i class="material-icons">edit</i></button>
                        </a>
                        @if($c->deleted_at)
                        <a href="{{route('activargaleria',['idgaleria'=>$c->idgaleria])}}">
                          <button type="button" rel="tooltip" title="Activar" class="btn btn-success btn-link btn-sm">
                            <i class="material-icons">visibility</i></button>
                        </a>
                        <a href="{{route('borragaleria',['idgaleria'=>$c->idgaleria])}}">
                          <button type="button" rel="tooltip" title="Borrar" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">delete_forever</i></button>
                        </a>
                        @else
                        <a href="{{route('desactivagaleria',['idgaleria'=>$c->idgaleria])}}">
                          <button type="button" rel="tooltip" title="Desactivar" class="btn btn-warning btn-link btn-sm">
                            <i class="material-icons">disabled_by_default</i></button>
                        </a>
                      </center>

                      @endif
                    </td>
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