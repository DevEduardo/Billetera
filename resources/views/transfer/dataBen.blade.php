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
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 offset-3">
       <div class="card">
            <!--<div class="card-header d-flex align-items-center">
             <h3 class="trans">{{monto($envia)}}</h3>
            <i class="fa fa-exchange " id="trans"></i>
            <h3 class="trans">{{monto($recibe)}}</h3>
            <h3>Datos de la transferencia</h3>
          </div> -->
          <div class="card-body">
            <form action="{{url('/Transfer')}}" method="post" id="" class="col-xs-12 col-md-12 ">
              {{ csrf_field() }}
              <h4>Datos del destinatario</h4><br>
              <div class="input-field">
                <input type="text" name="nombres">
                <label for="">Nombres</label>
              </div>
              <div class="input-field">
                <input type="text" name="apellidos">
                <label for="">Apellidos</label>
              </div>
              <div class="input-field">
                <input type="email" name="email" >
                <label for="">Correo</label>
              </div>
              <h4>Detalles bancarios</h4><br>
              <div class="input-field">
                <input type="number" name="cuenta">
                <label for="">Numero de cuenta</label>
              </div>
              <div class="input-field">
                <select name="banco">
                  <option disabled selected>SELECCIONE SU OPCION</option>
                  <option value="0">Banco de Venezuela</option>
                  <option value="0">Bicentenario</option>
                  <option value="0">Banco del Tesoro</option>
                  <option value="0">Mercantil</option>
                  <option value="0">Probincial</option>
                </select>
                <label for="">Entidad bancaria</label>
              </div>
              <div class="input-field">
                <input type="text" name="codigo" value="{{generateCode(10)}}" readonly>
                <label for="">Código de referencia</label>
              </div>
              <input type="hidden" name="user" value="{{Auth::user()->id}}">
              <input type="hidden" name="cantidad" value="{{$envia}}">
              <button class="btn waves-effect waves-light right" type="submit" name="action">Siguiente</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /PAGE CONTENT -->
@endsection
