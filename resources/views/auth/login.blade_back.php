@extends('layouts.login')

@section('content')

<div class="page-container">
        <!-- PAGE CONTENT -->
        <div class="content h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="login card auth-box mx-auto my-auto">
                        <div class="card-block text-center">
                            <div class="user-icon">
                                <i class="fa fa-user-circle"></i>
                            </div>

                            <h4 class="text-light">Iniciar sesion</h4>
                            <form   method="POST" action="{{ url('/login') }}">
                            <div class="user-details">
                                  {{ csrf_field() }}

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-user-o"></i>
                                            </span>
                                        <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Usuario" aria-describedby="basic-addon1">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                                <i class="fa fa-key"></i>
                                            </span>
                                        <input type="password"  name="password" class="form-control " placeholder="Contraseña" aria-describedby="basic-addon1">
                                    </div>
                                </div>

                            </div>

                            {{ Form::submit('Ingresar', array('type' => 'submit', 'class' => 'btn btn-success  btn-lg width-100')) }}
                            </form>
                            <div class="user-links">
                                <a href="#" class="pull-left">Olvido su contraseña?</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /PAGE CONTENT -->
    </div>
@endsection
