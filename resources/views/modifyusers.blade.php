@extends('dashboard')

@section('contenido')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Modificación usuarios</h4>
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
                        <form action="{{route('savechanges')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="form-group">
                                    <label for="idusuario">Clave del usuario:
                                    </label>
                                    <input type="text" name="idusuaio" id="idusuaio" value="{{$consult->idusuaio}}" readonly="readonly" class="form-control" placeholder="Clave empleado">
                                    @if($errors->first('idusuaio'))
                                    <p class="text-danger">{{$errors->first('idusuaio')}}</p>
                                    @endif
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre:
                                        </label>
                                        <input type="text" name="nombre" id="nombre" value="{{$consult->nombre}}" class="form-control" placeholder="Nombre">
                                        @if($errors->first('nombre'))
                                        <p class="text-danger">{{$errors->first('nombre')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="apellido">Apellido Paterno:
                                        </label>
                                        <input type="text" name="app" id="app" value="{{$consult->app}}" class="form-control" placeholder="Apellido">
                                        @if($errors->first('app'))
                                        <p class="text-danger">{{$errors->first('app')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="apellido">Apellido Materno:
                                        </label>
                                        <input type="text" name="apm" id="apm" value="{{$consult->apm}}" class="form-control" placeholder="Apellido">
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
                                        <input type="email" name="email" id="email" value="{{$consult->email}}" class="form-control" placeholder="Email">
                                        @if($errors->first('email'))
                                        <p class="text-danger">{{$errors->first('email')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="contraseña">Contraseña:
                                        </label>
                                        <input type="password" name="contraseña" id="contraseña" value="{{$consult->contraseña}}" class="form-control" placeholder="Contraseña">

                                        @if($errors->first('contraseña'))
                                        <p class="text-danger">{{$errors->first('contraseña')}}</p>
                                        @endif
                                    </div>
                                </div>
                                @if($consult->sexo=='M')
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
                                @else
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <label for="dni">Sexo:</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="sexo1" name="sexo" value="M" class="custom-control-input">
                                        <label class="custom-control-label" for="sexo1">Masculino</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="sexo2" name="sexo" value="F" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="sexo2">Femenino</label>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="state_id" class="control-label">Tipo de Usuario:</label>
                                        <select name="idtipoususario" class="form-control" id="idtipoususario">
                                            <option value="{{$consult->idtipoususario}}">{{$consult->typeuser}}</option>
                                            @foreach($typeusers as $tu)
                                            <option value="{{$tu->idtipoususario}}">{{$tu->tipo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="">
                                        <label for="img">Foto de perfil:
                                            @if($consult->img == null)
                                                <center><img src="{{asset('files/sinfoto.jpg')}}" height="150" width="150"></center>
                                            @else
                                            <img src="{{asset('files/'. $consult->img)}}" height="150" width="150">
                                            @endif
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
                                        <label for="celular">Teléfono:
                                        </label>
                                        <input type="text" name="celular" id="celular" value="{{$consult->celular}}" class="form-control" placeholder="Teléfono">

                                        @if($errors->first('celular'))
                                        <p class="text-danger">{{$errors->first('celular')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="ciudad">Ciudad:
                                        </label>
                                        <input type="text" name="ciudad" id="ciudad" value="{{$consult->ciudad}}" class="form-control" placeholder="Ciudad">

                                        @if($errors->first('ciudad'))
                                        <p class="text-danger">{{$errors->first('ciudad')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="calle">Calle:
                                        </label>
                                        <input type="text" name="calle" id="calle" value="{{$consult->calle}}" class="form-control" placeholder="Calle">

                                        @if($errors->first('calle'))
                                        <p class="text-danger">{{$errors->first('calle')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="nocalle">Número de Calle:
                                        </label>
                                        <input type="text" name="nocalle" id="nocalle" value="{{$consult->nocalle}}" class="form-control" placeholder="Número de Calle">

                                        @if($errors->first('nocalle'))
                                        <p class="text-danger">{{$errors->first('nocalle')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="cp">Código Postal:
                                        </label>
                                        <input type="text" name="cp" id="cp" value="{{$consult->cp}}" class="form-control" placeholder="Código Postal">

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