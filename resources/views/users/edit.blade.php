@extends('layouts.app')

@section('content')
<div class="col-md-6 col-md-offset-3">
  <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Nuevo usuario</h3>
        </div>
        <div class="panel-body">
            {{Form::open(['url' => 'usuario/'.$data->id ],['method' => 'put'], ['class' => 'col-md-5 col-md-offset-2'])}}

              <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::Text('name', $data->name, ['class' => 'form-control']) !!}
              </div>

              <div class="form-group">
                {!! Form::label('username', 'Usuario') !!}
                {!! Form::Text('username', $data->username, ['class' => 'form-control']) !!}
              </div>

              <div class="form-group">
                {!! Form::label('email', 'Correo') !!}
                {!! Form::Text('email', $data->email, ['class' => 'form-control']) !!}
              </div>

              <div class="form-group">
                {!! Form::label('rol', 'Rol') !!}<br>
                <!--{{ Form::select('rol', $rol, null,  ['class' => 'field form-control' ]) }}-->
                <select class="form-control" name="rol">
                  @foreach($rol as $rols)
                    @if($rols->id == $data->rol)
                      <option value="{{$rols->id}}" selected="selected">{{$rols->name}}</option>
                    @else
                      <option value="{{$rols->id}}">{{$rols->name}}</option>
                      @endif
                  @endforeach
                </select>
              </div>
              <div class="btn-form">
                
              </div>
              {{ Form::submit('Guardar', array('type' => 'submit', 'class' => 'btn btn-success  btn-lg width-50')) }}
              {{ Form::submit('Canceelar', array('type' => 'submit', 'class' => 'btn btn-danger  btn-lg width-50')) }}
            {{Form::close()}}
         </div>
      </div>
</div>
@endsection
