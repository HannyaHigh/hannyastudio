@extends('dashboard')

@section('contenido')

<div class="content">
    <div class="container-fluid">
        <div class="container">
            <a href="{{route('users')}}">
                <button class="btn btn-secondary">
                    Alta de nuevos usuarios.
                </button>
            </a>
        </div>
        @if(Session::has('mensaje'))
        <div>
            <button type="button" class="alert alert-success">{{Session::get('mensaje')}}</button>
        </div>
        @endif
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header card-header-primary">
                        Reportes
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        <center>Clave</center>
                                    </th>
                                    <th>
                                        <center>Foto</center>
                                    </th>
                                    <th>
                                        <center>Nombre</center>
                                    </th>
                                    <th>
                                        <center>Apellidos</center>
                                    </th>
                                    <th>
                                        <center>Email</center>
                                    </th>
                                    <th>
                                        <center>Celular</center>
                                    </th>
                                    <th>
                                        <center>Usuario</center>
                                    </th>
                                    <th>
                                        <center>Operaciones</center>
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($consult as $object)
                                    <tr>
                                        <td>
                                            <center>{{$object->idusuaio}}</center>
                                        </td>
                                        <td>
                                            @if($object->img == null)
                                                <center><img src="{{asset('files/sinfoto.jpg')}}" height="50" width="50"></center>
                                            @else
                                                <center><img src="{{asset('files/'. $object->img)}}" height="50" width="50"></center>
                                            @endif
                                        </td>
                                        <td>
                                            <center>{{$object->nombre}}</center>
                                        </td>
                                        <td>
                                            <center>{{$object->app}} {{$object->apm}}</center>
                                        </td>
                                        <td>
                                            <center>{{$object->email}}</center>
                                        </td>
                                        <td>
                                            <center>{{$object->celular}}</center>
                                        </td>
                                        <td>
                                            <center>{{$object->typeuser}}</center>
                                        </td>
                                        <td class="td-actions text-primary">
                                            <center>
                                                <a href="{{route('modifyusers', ['idusuaio'=>$object->idusuaio])}}">
                                                    <button type="button" rel="tooltip" title="Modificar" class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </a>
                                                @if($object->deleted_at)
                                                <a href="{{route('reactiveusers', ['idusuaio'=>$object->idusuaio])}}">
                                                    <button type="button" rel="tooltip" title="Reactivar" class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">visibility</i>
                                                </a>
                                                <a href="{{route('deleteusers', ['idusuaio'=>$object->idusuaio])}}">
                                                    <button type="button" rel="tooltip" title="Borrar Registro" class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">delete_forever</i>
                                                </a>
                                                @else
                                                <a href="{{route('blockusers', ['idusuaio'=>$object->idusuaio])}}">
                                                    <button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">disabled_by_default</i>
                                                </a>
                                                @endif
                                            </center>
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