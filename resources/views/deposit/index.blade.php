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
    <h2 class="no-margin-bottom">Deposito</h2>
  </div>
</header>

<!-- PAGE CONTENT -->
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 offset-3">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="h4">Realizar Deposito</h3>
          </div>
          <div class="card-body">
            <form action="{{url('/Deposit')}}" method="post" id="formDeposito" class="col-xs-12 col-md-12 ">
              {{ csrf_field() }}
              <div class="input-field">
                <select class="" name="money">
                  <option selected disabled>Seleccione su opcion</option>
                  <option value="0">Euro</option>
                  <option value="1">Dolar</option>
                  <option value="2">Yen</option>
                  <option value="3">Pesos Colombiano</option>
                </select>
                <label for="">Tipo de Moneda</label>
              <div class="input-field inp-field">
                <p>
                  <input name="bank" value="0" type="radio" id="bank" class="with-gap">
                  <label for="bank">Banco 1</label>
                </p>
              </div><br>
              <div class="input-field">
                <input type="text" name="quantity" >
                <label>Cantidad transferida</label>
              </div>
              <div class="input-field">
                <input type="text" name="date" class="datepicker">
                <label> Fecha en que realizo la transferencia</label>
              </div>
              <small>NOTA: Sera enviado un comprobante a su correo elecctronico y se le notificara cuando el deposito se alla echo efectivo</small><br><br>
              <button class="btn waves-effect waves-light right" type="submit" name="action">Enviar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /PAGE CONTENT -->
@endsection
