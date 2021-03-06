@extends('dashboard')

@section('contenido')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Alta de usuarios</h4>
                    </div>
                    <div class="card-body">
                        <!--                         
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif -->
                        <form action="{{route('guardarusuarios')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="form-group">
                                    <label for="idusuario">Clave del usuario:
                                    </label>
                                    <input type="text" name="idusuario" id="idusuario" value="{{$nextid}}" readonly="readonly" class="form-control" placeholder="Clave empleado">
                                    @if($errors->first('idusuario'))
                                    <p class="text-danger">{{$errors->first('idusuario')}}</p>
                                    @endif
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre:
                                        </label>
                                        <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre">
                                        @if($errors->first('nombre'))
                                        <p class="text-danger">{{$errors->first('nombre')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="apellido">Apellido Paterno:
                                        </label>
                                        <input type="text" name="app" id="app" value="{{old('app')}}" class="form-control" placeholder="Apellido">
                                        @if($errors->first('app'))
                                        <p class="text-danger">{{$errors->first('app')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="apellido">Apellido Materno:
                                        </label>
                                        <input type="text" name="apm" id="apm" value="{{old('apm')}}" class="form-control" placeholder="Apellido">
                                        @if($errors->first('apm'))
                                        <p class="text-danger">{{$errors->first('apm')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <br><br>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email:
                                        </label>
                                        <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                                        @if($errors->first('email'))
                                        <p class="text-danger">{{$errors->first('email')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="contrase??a">Contrase??a:
                                        </label>
                                        <input type="password" name="contrase??a" id="contrase??a" value="{{old('contrase??a')}}" class="form-control" placeholder="Contrase??a">

                                        @if($errors->first('contrase??a'))
                                        <p class="text-danger">{{$errors->first('contrase??a')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <label for="dni">Sexo:</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="sexo1" name="sexo" value="M" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="sexo1">Masculino</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="sexo2" name="sexo" value="F" class="custom-control-input">
                                        <label class="custom-control-label" for="sexo2">Femenino</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="state_id" class="control-label">Tipo de Usuario:</label>
                                        <select name="idtipoususario" class="form-control" id="idtipoususario">
                                            @foreach($typeusers as $tu)
                                            <option value="{{$tu->idtipoususario}}">{{$tu->tipo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <label for="dni">El usuario esta:</label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" id="activo1" name="activo" class="form-check-input" value="Si" checked>Activo
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" id="activo1" name="activo" value="No">Inactivo
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="">
                                        <label for="img">Foto de perfil:

                                            <input type="file" name="img" id="img" class="form-control" placeholder="Subir foto">
                                        </label>
                                        @if($errors->first('img'))
                                        <p class="text-danger">{{$errors->first('img')}}</p>
                                        @endif
                                    </div>
                                </div>

                            </div><br>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="celular">Tel??fono:
                                        </label>
                                        <input type="text" name="celular" id="celular" value="{{old('celular')}}" class="form-control" placeholder="Tel??fono">

                                        @if($errors->first('celular'))
                                        <p class="text-danger">{{$errors->first('celular')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="ciudad">Ciudad:
                                        </label>
                                        <input type="text" name="ciudad" id="ciudad" value="{{old('ciudad')}}" class="form-control" placeholder="Ciudad">

                                        @if($errors->first('ciudad'))
                                        <p class="text-danger">{{$errors->first('ciudad')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="calle">Calle:
                                        </label>
                                        <input type="text" name="calle" id="calle" value="{{old('calle')}}" class="form-control" placeholder="Calle">

                                        @if($errors->first('calle'))
                                        <p class="text-danger">{{$errors->first('calle')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="nocalle">N??mero de Calle:
                                        </label>
                                        <input type="text" name="nocalle" id="nocalle" value="{{old('nocalle')}}" class="form-control" placeholder="N??mero de Calle">

                                        @if($errors->first('nocalle'))
                                        <p class="text-danger">{{$errors->first('nocalle')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="cp">C??digo Postal:
                                        </label>
                                        <input type="text" name="cp" id="cp" value="{{old('cp')}}" class="form-control" placeholder="C??digo Postal">

                                        @if($errors->first('cp'))
                                        <p class="text-danger">{{$errors->first('cp')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="captcha">Captcha</label>
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}
                                    @error('g-recaptcha-response')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                            </div> -->
                            </div>
                            <button type="submit" value="Guardar" class="btn btn-primary pull-right">Enviar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop