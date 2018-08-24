@extends('layouts.app')
@section('script')
  <script type="text/javascript">
  $(document).ready(function(){
    $('#i').addClass('active');
    $('#t').removeClass('active');
    $('#cb').removeClass('active');

    $('select').material_select();

  });

  </script>
@endsection
@section('content')
<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Trasferencia</h2>
  </div>
</header>

<!-- PAGE CONTENT -->
<section>
  <div class="container-fluid ">
    <div class="row ">
      <div class="col-lg-8 offset-2">
        <div class="row">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h3">Datos de trasferencia</h3>
            </div>
            <div class="card-body">
              <form action="{{url('/Transfer/destino')}}" method="post" id="formDeposito" >
                {{ csrf_field() }}
                <div class="input-field">
                  <select name="moneda" id="moneda">
                    @foreach($monedas as $moneda)
                    @if($moneda->abreviatura == Auth::user()->moneda)
                    <option value="{{$moneda->abreviatura}}" disabled>{{$moneda->abreviatura}} - {{$moneda->nombre}}</option>
                    @else
                    <option value="{{$moneda->abreviatura}}">{{$moneda->abreviatura}} - {{$moneda->nombre}}</option>
                    @endif

                    @endforeach
                  </select>
                  <label for="">Pais</label>
                </div><br><br>
                <div class="input-field">
                  <input type="text" name="envia" class="envia" placeholder="0.00" id="envia" autocomplete="off" >
                  <label for="">Ingrese la cantidad a enviar</label>
                </div>
                <div class="">
                  <input type="hidden" id="moneda1" value="{{Auth::user()->moneda}}">
                  <small>Tasa de cambio referencial.  1,00 {{Auth::user()->moneda}} =  <i id="tasa"></i> </small>
                </div><br><br>
                <div class="input-field">
                  <input type="hidden" id="tasas" value="">
                  <input type="text" name="recibe" class="envia" placeholder="0.00" id="recibe" autocomplete="off" >
                  <label for="">Cantidad que recibe</label>
                </div>
                <input type="hidden" name="user" value="{{Auth::user()->id}}">
                <button class="btn waves-effect waves-light right" type="submit" name="action">Siguiente</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- /PAGE CONTENT -->
@endsection
