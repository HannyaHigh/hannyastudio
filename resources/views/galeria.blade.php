@extends('dashboard')

@section('contenido')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Alta de Galeria:</h4>
          </div>
          <div class="card-body">
            <form action="{{route('guardargaleria')}}" method="POST" enctype='multipart/form-data'>
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Clave de la Galeria:
                      @if($errors->first('idgaleria'))
                      <P class='text-danger'>{{$errors->first('idgaleria')}}</p>
                      @endif
                    </label>
                    <input type="text" name="idgaleria" id="idgaleria" value="{{$idgaleriasigue}}" readonly="readonly" placeholder="Clave de la Galeria" class="form-control">
                  </div>
                </div>

                <div class="col-md-5">
                  <div class="form-group">
                    <label for="state_id">Servicio:</label>
                    <select name='idservicio' class="custom-select">
                      <option selected="">Selecciona un servicio</option>
                      @foreach($servicio as $servicio)
                      <option value="{{$servicio->idservicio}}">{{$servicio->servicio}}</option>
                      @endforeach
                    </select>
                  </div>
                </div><br>
                <!-- <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Servicio:
                      @if($errors->first('servicio'))
                      <P class='text-danger'>{{$errors->first('servicio')}}</p>
                      @endif
                    </label>
                    <textarea type="text" name="servicio" id="servicio" value="{{old('servicio')}}" class="form-control">
                    </textarea>
                  </div>
                </div> -->
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Descripción:
                      @if($errors->first('descripcion'))
                      <P class='text-danger'>{{$errors->first('descripcion')}}</p>
                      @endif
                    </label>
                    <textarea type="text" name="descripcion" id="descripcion" value="{{old('descripcion')}}" class="form-control">
                    </textarea>
                  </div>
                </div>

              </div>

              <button type="submit" class="btn btn-primary pull-right">Guardar</button>
              <a href="{{route('reportegaleria')}}">
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