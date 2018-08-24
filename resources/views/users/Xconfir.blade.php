@extends('layouts.login')
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
            <h3>
              <p>Se a registrado satisfactoriamente!!</p>
              <p>Gracias por confiar en nosotros.</p>
              <p>La informacion suministrada sera evaluada, y le notificaremos cuando su cuenta este activa</p>

            </h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
