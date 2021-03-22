@extends('dashboard')

@section('contenido')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Modificación De Clientes</h4>
          </div>
          <div class="card-body">
            <form action="{{route('guardarcambiocliente')}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">ID Cliente:</label>
                    <input type="text" name="idcliente" id="idcliente" value="{{$consulta->idcliente}}" readonly="readonly" class="form-control">
                    @if($errors->first('idcliente'))
                    <P class='text-danger'>{{$errors->first('idcliente')}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre:</label>
                    <input type="text" name="nombrec" id="nombrec" value="{{$consulta->nombrec}}" class="form-control">
                    @if($errors->first('nombrec'))
                    <p class="text-danger">{{$errors->first('nombrec')}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Apellido Paterno:</label>
                    <input type="text" name="apellidopa" id="apellidopa" value="{{$consulta->apellidopa}}" class="form-control">
                    @if($errors->first('apellidopa'))
                    <p class="text-danger">{{$errors->first('apellidopa')}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Apellido Materno:</label>
                    <input type="text" name="apellidoma" id="apellidoma" value="{{$consulta->apellidoma}}" class="form-control">
                    @if($errors->first('apellidoma'))
                    <p class="text-danger">{{$errors->first('apellidoma')}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Sexo:</label><br>
                    @if($consulta->sexo=='Femenino')
                    <div class="custom-control custom-radio">
                      <input type="radio" id="sexo1" name="sexo" value="Masculino" class="custom-control-input">
                      <label class="custom-control-label" for="sexo1">Masculino</label> <br>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="sexo2" name="sexo" value="Femenino" class="custom-control-input" checked="">
                      <label class="custom-control-label" for="sexo2">Femenino</label>
                    </div>
                    @else
                    <div class="custom-control custom-radio">
                      <input type="radio" id="sexo1" name="sexo" value="Masculino" class="custom-control-input" checked="">
                      <label class="custom-control-label" for="sexo1">Masculino</label> <br>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="sexo2" name="sexo" value="Femenino" class="custom-control-input">
                      <label class="custom-control-label" for="sexo2">Femenino</label>
                    </div>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" value="{{$consulta->telefono}}" class="form-control">
                    @if($errors->first('telefono'))
                    <p class="text-danger">{{$errors->first('telefono')}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Correo Electrónico:</label>
                    <input type="text" name="correo" id="correo" value="{{$consulta->correo}}" class="form-control">
                    @if($errors->first('correo'))
                    <p class="text-danger">{{$errors->first('correo')}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Contraseña:</label>
                    <input type="password" name="contraseña" id="contraseña" value="{{$consulta->contraseña}}" class="form-control">
                    @if($errors->first('contraseña'))
                    <p class="text-danger">{{$errors->first('contraseña')}}</p>
                    @endif
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="state_id">Cuidad:</label>
                    <select name='ciudad' class="custom-select">
                      <option value="{{$consulta->ciudad}}">{{$consulta->ciudad}}</option>
                      <option value="Canadá">Canadá</option>
                      <option value="Estados Unidos">Estados Unidos</option>
                      <option value="Japón">Japón</option>
                      <option value="México">México</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Calle:</label>
                    <input type="text" name="calle" id="calle" value="{{$consulta->calle}}" class="form-control">
                    @if($errors->first('calle'))
                    <p class="text-danger">{{$errors->first('calle')}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">No. Calle:</label>
                    <input type="text" name="nocalle" id="nocalle" value="{{$consulta->nocalle}}" class="form-control">
                    @if($errors->first('nocalle'))
                    <p class="text-danger">{{$errors->first('nocalle')}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Código Postal:</label>
                    <input type="text" name="CP" id="CP" value="{{$consulta->CP}}" class="form-control">
                    @if($errors->first('CP'))
                    <p class="text-danger">{{$errors->first('CP')}}</p>
                    @endif
                  </div>
                </div>
                <div class="col-md-12">
                  <p><label for="img">Foto de Perfil:
                      @if($consulta->img == null)
                      <center><img src="{{asset('files/sinfoto.jpg')}}" height="150" width="150"></center>
                      @else
                      <img src="{{asset('files/'. $consulta->img)}}" height="100" width="100">
                      @endif
                      @if($errors->first('img'))
                      <p class="text-danger">{{$errors->first('img')}}</p>
                      @endif
                      <input type="file" name="img" id="img" class="form-control">
                    </label></p>
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