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
                  <div class=" col-lg-12 text-aling-center">
                    <h4 class="h4">Metodo de envio</h4>
                  </div>

                  <div class="col s6 m7">
                    <div class="card">
                      <div class="card-image">
                        <img src="{{asset('assets/img/cartera.png')}}" class="logo-sm">

                      </div>
                      <div class="card-content">
                        <p>Enviar dinero a una direccion de correo</p><br>
                      </div>
                      <div class="card-action">
                        <a href="{{url('transfer/email')}}" class="font-green">Comenzar</a>
                      </div>
                    </div>
                  </div>

                  <div class="col s6 m7">
                    <div class="card">
                      <div class="card-image">
                        <img src="{{asset('assets/img/envio.png')}}" class="logo-sm">
                      </div>
                      <div class="card-content">
                        <p>Enviar dinero directamente a cuentas bancarias</p>
                      </div>
                      <div class="card-action ">
                        <a href="{{url('transfer/direct')}}"class="font-green">Comenzar</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
<!-- /PAGE CONTENT -->
@endsection
