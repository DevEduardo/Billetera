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
      <div class="col-lg-12 col-xs-12">
        <button class="hidden btn-floating btn-floating-right btn-medium waves-effect waves-light red" id='clear-2' name="action">
          <i class="material-icons">clear</i>
        </button>
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="h4" id='title-2'>Ajustes del sistema </h3>
          </div>
          <div class="card-body">

              <div id="idName" class="ajustes">
                <small>Monedas actuales en el sistema</small><a href="#" id="moneda"><i class="fa fa-edit"></i></a>
              </div>
              <div id="editName">
                @if($count == 0)
                  <div class="alert alert-danger alert-bank" role="alert">
                    <i class="material-icons">report_problem</i>Actualmente no posee monedas registradas. Por favor ingrese una nueva moneda.
                    <button type="button" class="close" id="closeA" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @else
                <div id="dataMoneda">

                </div>
                
              </div>
              <div id="regMoneda">
                {{Form::open(['url'=>'Monedas','id'=>'monedaForm'])}}
                  {{csrf_field()}}
                  <div class="input-field" required>
                    <select id="pais">
                      <option selected disabled>Seleccione un pais</option>
                      @foreach($paises as $pais)
                      <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                      @endforeach
                    </select>
                    <label>Pais</label>
                  </div>
                  {!!Field::text('signo',['autocomplete'=>'off','id'=>'signo'])!!}
                  {!!Field::text('codigo_iso',['autocomplete'=>'off','id'=>'codigo'])!!}
                  <button class="btn waves-effect waves-red right" type="submit" name="action">Guardar
                    <i class="material-icons right">send</i>
                  </button>
                {{Form::close()}}
              </div>


            <div id="idEmail" class="ajustes">
              <small>Tasas de cambio</small>
              <a href="#" id="email"><i class="fa fa-edit"></i></a>
            </div>
            <div id="editEmail">
              {{Form::open(['url'=>'settings/tasas','id'=>'tasaForm'])}}
                {{csrf_field()}}
                <div class="input-field" required>
                  <select id="moneda1">
                    <option selected disabled>Seleccione una moneda</option>
                    @foreach($monedas as $moneda)
                    <option value="{{$moneda->abreviatura}}">{{$moneda->abreviatura}}</option>
                    @endforeach
                  </select>
                  <label>De</label>
                </div>

                <div class="input-field" required>
                  <select id="moneda2">
                    <option selected disabled>Seleccione una moneda</option>
                    @foreach($monedas as $moneda)
                    <option value="{{$moneda->abreviatura}}">{{$moneda->abreviatura}}</option>
                    @endforeach
                  </select>
                  <label>A</label>
                </div>
                {!!Field::text('tasa_de_cambio',array('autocomplete' => 'off', 'required'))!!}
                <button class="btn waves-effect waves-red right" type="submit" name="action">Guardar
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
