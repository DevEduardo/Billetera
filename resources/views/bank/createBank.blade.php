@extends('layouts.app')
@section('script')
  <script type="text/javascript">
  $(document).ready(function(){
    $('#i').removeClass('active');
    $('#t').removeClass('active');
    $('#cb').addClass('active');

    $('select').material_select();
  });

  </script>
@endsection
@section('content')
<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Cuentas Bancarias</h2>
    <i class="right fa fa-money" id="fa"></i>
    <i class="right fa fa-dollar" id="fe"></i>
    <i class="right fa fa-exchange" id="fi"></i>
  </div>
</header>

<!-- PAGE CONTENT -->
<section class="tables">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="h4">Registrar Cuenta </h3>
          </div>
          <div class="card-body">
            <form method="post" action="{{ url('/Bank') }}">
              {{ csrf_field() }}
              <div class="input-field ">
                <select name="pais" >
                  <option value="" disabled selected>Elige tu opción</option>
                  <option value="1">Venezuela</option>
                  <option value="2">Colombia</option>
                  <option value="3">Brasil</option>
                </select>
                <label>Pais</label>
              </div>

              <div class="input-field">
                <input  type="text" name="swift" required >
                <label  class="">SWIFT</label>
              </div>
              <div class="input-field">
                <input  type="text" name="Ncuenta" required class="">
                <label  class="">Nº de cuenta</label>
              </div>
            {{ Form::submit('Guardar cuenta', array('type' => 'submit', 'class' => 'btn btn-success width-100','id'=>'btn-form')) }}

          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /PAGE CONTENT -->
@endsection
