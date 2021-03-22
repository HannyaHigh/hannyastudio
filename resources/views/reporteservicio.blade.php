@extends('dashboard')

@section('contenido')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Reporte de Servicio:</h4>
                    </div>
                    <div class="card-body">
                        <br>
                        <a href="{{route('servicio')}}">
                            <button type="button" class="btn btn-success ">Alta de Servicio</button></a>
                        <br>
                        <br>
                        @if(Session::has('mensaje'))
                        <div class="alert alert-success">{{Session::get('mensaje')}} </div>
                        @endif
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
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
                                        <center>Reparacion de foto o equipo</center>
                                    </th>
                                    <th>
                                        <center>Conversion de peliculas</center>
                                    </th>
                                    <th>
                                        <center>Impresion de gran formato</center>
                                    </th>
                                    <th>
                                        <center>Enmarcados</center>
                                    </th>
                                    <th>
                                        <center>Costo total</center>
                                    </th>
                                    <th>
                                        <center>Foto de ejemplo</center>
                                    </th>
                                    <th>
                                        <center>Operaciones</center>
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($consulta as $c)
                                    <tr>
                                        <td>
                                            <center>{{$c->idservicio}}</center>
                                        </td>
                                        <td>
                                            <center>{{$c->servicio}}</center>
                                        </td>
                                        <td>
                                            <center>{{$c->descripcion}}</center>
                                        </td>
                                        <td>
                                            <center>{{$c->reparacion}}</center>
                                        </td>
                                        <td>
                                            <center>{{$c->conversion}}</center>
                                        </td>
                                        <td>
                                            <center>{{$c->impresion}}</center>
                                        </td>
                                        <td>
                                            <center>{{$c->enmarcados}}</center>
                                        </td>
                                        <td>
                                            <center>{{$c->costo}}</center>
                                        </td>
                                        <td>
                                            @if($c->img == null)
                                            <center><img src="{{asset('files/sinfoto.jpg')}}" height="50" width="50"></center>
                                            @else
                                            <center>
                                                <img src="{{asset('files/'. $c->img)}}" height="65" width="65">
                                            </center>
                                            @endif
                                        </td>
                                        <td class="td-actions text-primary">
                                            <center>
                                                <a href="{{route('modificaservicio',['idservicio'=>$c->idservicio])}}">
                                                    <button type="button" rel="tooltip" title="Modificar" class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">edit</i></button>
                                                </a>
                                                @if($c->deleted_at)
                                                <a href="{{route('activarservicio',['idservicio'=>$c->idservicio])}}">
                                                    <button type="button" rel="tooltip" title="Activar" class="btn btn-success btn-link btn-sm">
                                                        <i class="material-icons">visibility</i></button>
                                                </a>
                                                <a href="{{route('borraservicio',['idservicio'=>$c->idservicio])}}">
                                                    <button type="button" rel="tooltip" title="Borrar" class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">delete_forever</i></button>
                                                    </button>
                                                </a>
                                                @else
                                                <a href="{{route('desactivaservicio',['idservicio'=>$c->idservicio])}}">
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