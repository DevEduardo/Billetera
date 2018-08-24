@extends('layouts.login')
@section('script')
  <script type="text/javascript">
  $(document).ready(function(){

    $('select').material_select();

  });

  </script>
@endsection
@section('content')
<div class="container d-flex align-items-center">
  <div class="form-holder has-shadow">
    <div class="row">
      <!-- Logo & Information Panel-->
      <div class="col-lg-6">
        <div class="info d-flex align-items-center">
          <div class="content">
            <div class="logo">
              <h1><img src="{{asset('assets/img/cloudlogo.png')}}" alt="" class="logo-sm"> </h1>
            </div>
            <p>Envie dinero a sus familiares y amigos de la forma mas segura</p>
          </div>
        </div>
      </div>
      <!-- Form Panel    -->
      <div class="col-lg-6 bg-white">
        <div class="form d-flex align-items-center">
          <div class="content">
            {{Form::open(['url' => '/users','method' => 'post', 'enctype'=>'multipart/form-data'])}}
              {{ csrf_field() }}
              <div class="input-field ">
                <select name="pais" >
                  <option selected disabled>Seleccione su opcion</option>
                  @foreach($paises as $pais)
                  <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                  @endforeach
                </select>
                <label>Pais</label>
              </div>
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Foto</span>
                    <input type="file" name="file">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                  </div>
                </div>
                {!!Field::text('cedula_o_pasaporte',array('autocomplete' => 'off', 'required'))!!}
                {!!Field::text('rif',array('autocomplete' => 'off', 'required'))!!}
                {!!Field::text('nombres',array('autocomplete' => 'off', 'required'))!!}
                {!!Field::text('telefono',array('autocomplete' => 'off', 'required'))!!}
                {!!Field::text('usuario',array('autocomplete' => 'off', 'required'))!!}
                {!!Field::email('correo',array('autocomplete' => 'off', 'required'))!!}
                {!!Field::password('contraseña',array('autocomplete' => 'off', 'required'))!!}
                <button class="btn waves-effect waves-red " type="submit" name="action">Registrar
                  </button>
            {{Form::close()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
