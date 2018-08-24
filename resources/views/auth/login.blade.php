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
              <h1><img src="{{asset('assets/img/cloudlogo2.png')}}" class="logo-sm"></h1>
            </div>
            <p>Envie dinero a sus familiares y amigos de la forma mas segura</p>
          </div>
        </div>
      </div>
      <!-- Form Panel    -->
      <div class="col-lg-6 bg-white">
        <div class="form d-flex align-items-center">
          <div class="content">
            <form id="login-form" method="post" action="{{ url('/login') }}">
              {{ csrf_field() }}
              <div class="form-group">
                <input id="login-username" type="text" name="username" required class="input-material">
                <label for="login-username" class="label-material">Usuario</label>
              </div>
              <div class="form-group">
                <input id="login-password" type="password" name="password" required class="input-material">
                <label for="login-password" class="label-material">Contraseña</label>
              </div>
              {{ Form::submit('Ingresar', array('type' => 'submit', 'class' => 'btn btn-success width-100')) }}<br><br>
            </form><a href="#" class="forgot-pass">¿Ha olvidado su contraseña?</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
