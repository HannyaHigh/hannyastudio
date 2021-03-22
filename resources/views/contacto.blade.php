@extends('dashboard')

@section('contenido')


<!-- End Navbar -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Alta De Contactos</h4>
          </div>
          <div class="card-body">
            <form action="{{route('guardarcontacto')}}" method="POST">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Clave Contacto:</label>
                    <input type="text" name="idcontacto" id="idcontacto" value="{{$idcontactosigue}}" readonly="readonly" class="form-control">
                    @if($errors->first('idcontacto'))
                    <p class="text-danger">{{$errors->first('idcontacto')}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}" class="form-control">
                    @if($errors->first('nombre'))
                    <p class="text-danger">{{$errors->first('nombre')}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Apellido Paterno:</label>
                    <input type="text" name="app" id="app" value="{{old('app')}}" class="form-control">
                    @if($errors->first('app'))
                    <p class="text-danger">{{$errors->first('app')}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Apellido Materno:</label>
                    <input type="text" name="apm" id="apm" value="{{old('apm')}}" class="form-control">
                    @if($errors->first('apm'))
                    <p class="text-danger">{{$errors->first('apm')}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Correo Electrónico:</label>
                    <input type="text" name="correoc" id="correoc" value="{{old('correoc')}}" class="form-control">
                    @if($errors->first('correoc'))
                    <p class="text-danger">{{$errors->first('correoc')}}</p>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Mensaje:</label>
                    <input type="text" name="mensaje" id="mensaje" value="{{old('mensaje')}}" class="form-control">
                    <div class="form-group">
                      @if($errors->first('mensaje'))
                      <p class="text-danger">{{$errors->first('mensaje')}}</p>
                      @endif
                      <label class="bmd-label-floating"> </label>
                    </div>
                  </div>
                  
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