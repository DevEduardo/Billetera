@extends('layouts.app')
@section('script')
  <script type="text/javascript">
  $(document).ready(function(){
    $('#i').removeClass('active');
    $('#t').removeClass('active');
    $('#cb').addClass('active');
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
    <div class="row">
      <div class="col-lg-12">
        @if(Session::has('flash_message'))
        <div class="alert alert-success alert-bank" role="alert">
          {{Session::get('flash_message')}}
          <button type="button" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="h4">Cuentas Bancarias Registradas </h3>
            @if($count >0)
            <a href="{{url('/Bank/create')}}" class="link"> <i class="fa fa-plus "></i></a>
            @endif
          </div>
          <div class="card-body">
            <div class="table-responsive">

              <table class="table table-striped table-hover">
                @if($count == 0)
                No posee ninguna cuenta registrada <a href="{{url('/Bank/create')}}"> Registrar cuenta</a>
                @else
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Cuenta</th>
                    <th>Correo del beneficiario</th>
                    <th>Accion</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cuentas as $cuenta)
                  <tr>
                    <th scope="row">{{$cuenta->id}}</th>
                    <td>{{$cuenta->numero}}</td>
                    <td>{{$cuenta->pais}}</td>
                    <td>
                      <a href="{{url('/Bank/'.$cuenta->id.'/delete')}}" class="link-1-mg-0" onclick="return confirm('deseas elimar la cuenta seleccionada?')"><i class="fa fa-trash"></i></a>
                      <a href="#" class="link-1-mg-0"><i class="fa fa-edit"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /PAGE CONTENT -->
@endsection
