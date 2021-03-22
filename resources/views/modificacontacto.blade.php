@extends('dashboard')

@section('contenido')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Modificación de Contacto</h4>
          </div>
          <div class="card-body">
            <form action="{{route('guardarcambiocontacto')}}" method="POST">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">ID Contacto:</label>
                    <input type="text" name="idcontacto" id="idcontacto" value="{{$consulta->idcontacto}}" readonly="readonly" class="form-control">
                    @if($errors->first('idcontacto'))
                    <p class="text-danger">{{$errors->first('idcontacto')}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="{{$consulta->nombre}}" class="form-control">
                    @if($errors->first('nombre'))
                    <p class="text-danger">{{$errors->first('nombre')}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Apellido Paterno:</label>
                    <input type="text" name="app" id="app" value="{{$consulta->app}}" class="form-control">
                    @if($errors->first('app'))
                    <p class="text-danger">{{$errors->first('app')}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Apellido Materno:</label>
                    <input type="text" name="apm" id="apm" value="{{$consulta->apm}}" class="form-control">
                    @if($errors->first('apm'))
                    <p class="text-danger">{{$errors->first('apm')}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Correo Electrónico:</label>
                    <input type="text" name="correoc" id="correoc" value="{{$consulta->correoc}}" class="form-control">
                    @if($errors->first('correoc'))
                    <p class="text-danger">{{$errors->first('correoc')}}</p>
                    @endif
                  </div>
                </div>
              </diV>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Mensaje:</label>
                    <input type="text" name="mensaje" id="mensaje" value="{{$consulta->mensaje}}" class="form-control">
                    <div class="form-group">
                      @if($errors->first('mensaje'))
                      <p class="text-danger">{{$errors->first('mensaje')}}</p>
                      @endif
                      <label class="bmd-label-floating"> </label>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Guardar</button>
              <button type="reset" class="btn btn-danger pull-right">Cancelar</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop