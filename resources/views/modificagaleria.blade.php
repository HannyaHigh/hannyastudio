@extends('dashboard')

@section('contenido')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Modifica la Galeria:</h4>
          </div>
          <div class="card-body">
            <form action="{{route('guardacambiogaleria')}}" method="POST" enctype='multipart/form-data'>
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Clave de la Galeria:
                      @if($errors->first('idgaleria'))
                      <P class='text-danger'>{{$errors->first('idgaleria')}}</p>
                      @endif
                    </label>
                    <input type="text" name="idgaleria" id="idgaleria" value="{{$consulta->idgaleria}}" readonly="readonly" placeholder="Clave de la Galeria" class="form-control">
                  </div>
                </div>

                <div class="col-md-5">
                  <div class="form-group">
                    <label for="state_id">Servicio:</label>
                    <select name='idservicio' class="custom-select">
                      <option value="{{$consulta->idservicio}}">{{$consulta->servicio}}</option>
                      @foreach($servicio as $servicio)
                      <option value="{{$servicio->idservicio}}">{{$servicio->servicio}}</option>
                      @endforeach
                    </select>
                  </div>
                </div><br>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Descripción:
                      @if($errors->first('descripcion'))
                      <P class='text-danger'>{{$errors->first('descripcion')}}</p>
                      @endif
                    </label>
                    <textarea type="text" name="descripcion" id="descripcion" class="form-control">{{$consulta->descripcion}}
                    </textarea>
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