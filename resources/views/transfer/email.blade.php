@extends('layouts.app')
@section('script')
  <script type="text/javascript">
  $(document).ready(function(){
    $('#i').addClass('active');
    $('#t').removeClass('active');
    $('#cb').removeClass('active');

    $('select').material_select();
    $('#cantidad').keypress(function(){
      var val = $(this).val();
      var limit = $('#monto').val();
      if (val > limit) {
        $('#limit').addClass('danger');
        $('.btn').attr("disabled", true);
      }else{
        $('#limit').removeClass('danger');
      }
    });
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
              <form action="{{url('/Transfer/email')}}" method="post" id="formDeposito" class="col-lg-8 offset-2">
                {{ csrf_field() }}
                <div class="input-field">
                  <select name="moneda">
                    <option selected disabled>Escoja una opcion</option>
                    @foreach($monedas as $moneda)
                    <option value="{{$moneda->abreviatura}}">{{$moneda->abreviatura}}</option>
                    @endforeach
                  </select>
                  <label for="">Moneda</label>
                </div>
                <div class="input-field">
                  <input type="email" name="email" autocomplete="off" id="inputEmail" >
                  <label for="">Correo electronico del beneficiario</label>
                </div>
                <i id="showCorreos" class="material-icons green-text">add_circle</i>
                <div id="correos"  class="hidden">
                    <ul>
                      @foreach($emails as $email)
                      <li class="li">{{$email->emailB}}</li>
                      @endforeach
                    </ul>
                </div>

                <br>
                <div class="input-field">
                  <input type="text" name="envia" class="envia" placeholder="0.00" id="cantidad" autocomplete="off" >
                  <label for="">Ingrese la cantidad a enviar</label>
                </div>
                <input type="hidden"  value="{{monto($saldo)}}" id="monto" disabled>
                <small id="limit">limite: {{monto($saldo)}}</small>
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
