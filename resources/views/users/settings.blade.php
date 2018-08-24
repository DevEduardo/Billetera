@extends('layouts.app')
@section('script')
  <script type="text/javascript">
  $(document).ready(function(){
    $('#a').addClass('active');
    $('#t').removeClass('active');
    $('#cb').removeClass('active');

    $('select').material_select();
  });

  </script>
@endsection
@section('content')
<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Cuentas Bancarias</h2>
    <a href="#" class="right link-top"><i class=" fa fa-money" id="fa"></i></a>
    <a href="{{url('Deposit')}}" class="right link-top"><i class=" fa fa-dollar" id="fe"></i></a>
    <a href="{{url('Transfer')}}" class="right link-top"><i class=" fa fa-exchange" id="fi"></i></a>
  </div>
</header>

<!-- PAGE CONTENT -->
<section class="tables">
  <div class="container-fluid">
    @if(Session::has('flash_message'))
    <div class="alert alert-success alert-bank" role="alert">
      {{Session::get('flash_message')}}
      <button type="button" class="close" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif
    <div class="row">
      <div class="col-xs-12 col-lg-6">
        <button class="hidden btn-floating btn-floating-right btn-medium waves-effect waves-light red" id='clear-1' name="action">
          <i class="material-icons">clear</i>
        </button>
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="h4" id='title'>Ajustes de la cuenta</h3>
          </div>

          <div class="card-body">
            <!-- <div id="idIdioma" class="ajustes">
              <small>Idioma</small> <small class="data1">Español</small> <a href="#" id="idioma"><i class="fa fa-edit"></i></a>
            </div>
            <div id="editIdioma" class="hidden">
              <form action="{{ url('/settings/'.Auth::user()->id) }}" method="put" id="formIdioma">
                {{ csrf_field() }}
                  <div class="input-field ">
                    <select name="idioma" >
                      <option value="" disabled selected>Elige tu opción</option>
                      <option value="1">Español</option>
                      <option value="2">Ingles</option>
                    </select>
                    <label>Idioma</label>
                  <input type="hidden" name="data" value="0">
                  <a href="#" id="" class="clI cl"><i class="fa fa-close"></i></a>
                  <a href="#" class="enviar" id="subIdioma"><i class="fa fa-save"></i></a>
                </div>
              </form>
            </div> -->

            <div id="idPais" class="ajustes">
              <small>Pais</small> <small class="data2">
                @foreach($paises as $pais)
                @if($pais->id == Auth::user()->pais)
                {{$pais->nombre}}
                @endif
                @endforeach
              </small> <a href="#" id="pais"><i class="fa fa-edit"></i></a>
            </div>
            <div id="editPais" class="hidden">

              <form action="{{ url('/settings/'.Auth::user()->dni) }}" method="put" id="formPais">

                {{ csrf_field() }}
                  <div class="input-field ">
                    <select name="pais" >
                      @foreach($paises as $pais)
                      @if($pais->id == Auth::user()->pais)
                      <option value="{{$pais->id}}" selected>{{$pais->nombre}}</option>
                      @else
                      <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                      @endif
                      @endforeach
                    </select>
                    <label>Pais</label>
                  <input type="hidden" name="data" value="1">
                  <button class="btn waves-effect waves-red " type="submit" name="action">Guardar
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </form>
            </div>

            <div id="idCon" class="ajustes">
              <small>Contraseña</small> <small class="data3">**********</small> <a href="#" id="pasw"><i class="fa fa-edit"></i></a>
                          </div>
            <div id="editCon" class="hidden">
              <form action="{{ url('/settings/'.Auth::user()->dni) }}" method="put" id="formPasw">
                {{ csrf_field() }}
                  {!!Field::password('contraseña',array('id' => 'password','autocomplete' => 'off', 'required'))!!}
                  {!!Field::password('nueva_contrseña',array('id' => 'newPassword','autocomplete' => 'off', 'required'))!!}
                  {!!Field::password('confirmar_contraseña',array('id' => 'confPassword','autocomplete' => 'off', 'required'))!!}
                  <input type="hidden" name="data" value="2">
                  <button class="btn waves-effect waves-red " type="submit" name="action">Guardar
                    <i class="material-icons right">send</i>
                  </button>
                  </form>
            </div>

            <div id="idRefe" class="ajustes">
              <small>Referidos</small> <small class="data4"></small> <a href="#" id="refe"><i class="fa fa-edit"></i></a>
            </div>

            <div id="editRefe" class="hidden">
              <div class="input-field">
                <label for=""></label>
              {{url('users/create/'.Auth::user()->dni)}}
              <a href="#" class="enviar" id="subPasw"><i class="fa fa-copy"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-lg-6 col-xs-12">
        <button class="hidden btn-floating btn-floating-right btn-medium waves-effect waves-light red" id='clear-2' name="action">
          <i class="material-icons">clear</i>
        </button>
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="h4" id='title-2'>Infomación Personal </h3>
          </div>
          <div class="card-body">
            <div id="idName" class="ajustes">
              <small>Nombres</small> <small class="data1">{{Auth::user()->name}}</small> <a href="#" id="name"><i class="fa fa-edit"></i></a>

            </div>
            <div id="editName">
              {{Form::open(['url' => '/settings/'.Auth::user()->dni],['method' => 'put'])}}
                {{ csrf_field() }}
                  {!!Field::text('nombres',Auth::user()->name,array('id' => 'name','autocomplete' => 'off', 'required'))!!}
                  {!!Field::hidden('data',3)!!}
                  <button class="btn waves-effect waves-red " type="submit" name="action">Guardar
                    <i class="material-icons right">send</i>
                  </button>
              {{Form::close()}}
            </div>

            <div id="idEmail" class="ajustes">
              <small>Correo</small> <small class="data2">{{Auth::user()->email}}</small>
              <a href="#" id="email"><i class="fa fa-edit"></i></a>
            </div>
            <div id="editEmail">
              {{Form::open(['url' => '/settings/'.Auth::user()->dni],['method' => 'put'])}}
                {{ csrf_field() }}
                  {!!Field::text('correo',Auth::user()->email,array('id' => 'name','autocomplete' => 'off', 'required'))!!}
                  {!!Field::hidden('data',4)!!}
                  <button class="btn waves-effect waves-red " type="submit" name="action">Guardar
                    <i class="material-icons right">send</i>
                  </button>
              {{Form::close()}}
            </div>

            <div id="idPhone" class="ajustes">
              <small>Telefonos</small> <small class="data5">{{Auth::user()->phone}}</small> <a href="#" id="phone"><i class="fa fa-edit"></i></a>
            </div>
            <div id="editPhone">
              {{Form::open(['url' => '/settings/'.Auth::user()->dni],['method' => 'put'])}}
                {{ csrf_field() }}
                  {!!Field::text('telefono',Auth::user()->phone,array('id' => 'name','autocomplete' => 'off', 'required'))!!}
                  {!!Field::hidden('data',5)!!}
                  <button class="btn waves-effect waves-red " type="submit" name="action">Guardar
                    <i class="material-icons right">send</i>
                  </button>
              {{Form::close()}}
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<!-- /PAGE CONTENT -->
@endsection
