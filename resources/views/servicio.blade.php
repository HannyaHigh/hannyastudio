@extends('dashboard')

@section('contenido')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Alta de Servicio:</h4>
          </div>
          <div class="card-body">
            <form action="{{route('guardarservicio')}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="row">
                 <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Clave del Servicio:
                      @if($errors->first('idservicio'))
                      <P class='text-danger'>{{$errors->first('idservicio')}}</p>
                      @endif
                    </label>
                    <input type="text" name="idservicio" id="idservicio" value="{{$idserviciosigue}}" readonly="readonly" placeholder="Clave del Servicio" class="form-control">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Servicio:
                    @if($errors->first('servicio'))
                      <P class='text-danger'>{{$errors->first('servicio')}}</p>
                      @endif
                    </label>
                    <input type="text" name="servicio" id="servicio" value="{{old('servicio')}}" placeholder="Servicio:" class="form-control">
                  </div>
                </div><br>
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Descripción del Servicio:
                    @if($errors->first('descripcion'))
                      <P class='text-danger'>{{$errors->first('descripcion')}}</p>
                      @endif
                    </label>
                    <input type="text" name="descripcion" id="descripcion" value="{{old('descripcion')}}" placeholder="Descripción del Servicio" class="form-control">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Reparacion de foto o equipo:
                    @if($errors->first('reparacion'))
                      <P class='text-danger'>{{$errors->first('reparacion')}}</p>
                      @endif
                    </label>
                    <input type="text" name="reparacion" id="reparacion" value="{{old('reparacion')}}" placeholder="Reparacion de equipo" class="form-control">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Conversion de peliculas:
                    @if($errors->first('conversion'))
                      <P class='text-danger'>{{$errors->first('conversion')}}</p>
                      @endif
                    </label>
                    <input type="text" name="conversion" id="conversion" value="{{old('conversion')}}" placeholder="Conversion de peliculas" class="form-control">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Impresion de gran formato:
                    @if($errors->first('impresion'))
                      <P class='text-danger'>{{$errors->first('impresion')}}</p>
                      @endif
                    </label>
                    <input type="text" name="impresion" id="impresion" value="{{old('impresion')}}" placeholder="Impresion de gran formato" class="form-control">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Enmarcados:
                    @if($errors->first('enmarcados'))
                      <P class='text-danger'>{{$errors->first('enmarcados')}}</p>
                      @endif
                    </label>
                    <input type="text" name="enmarcados" id="enmarcados" value="{{old('enmarcados')}}" placeholder="Enmarcados" class="form-control">
                  </div>
                </div>

                 <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Costo total del servicio:
                    @if($errors->first('costo'))
                      <P class='text-danger'>{{$errors->first('costo')}}</p>
                      @endif
                    </label>
                    <input type="int" name="costo" id="costo" value="{{old('costo')}}" placeholder="Costo:" class="form-control">
                  </div>
                </div>
            <div class="col-md-12">
                  <p><label for="img">Foto de ejemplo:
                    @if($errors->first('img'))
                    <p class="text-danger">{{$errors->first('img')}}</p>
                    @endif
                    <input type="file" name="img" id="img" class="form-control">
                  </label></p>
                </div>
                </div>


              <button type="submit" class="btn btn-primary pull-right">Guardar</button>
              <a href="{{route('reporteservicio')}}">
              <button type="button" class="btn btn-danger pull-right">Cancelar</button>
              </a>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop