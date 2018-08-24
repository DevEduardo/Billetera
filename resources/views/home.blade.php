@extends('layouts.app')
@section('content')
<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Inicio</h2>
  </div>
</header>
<!-- Dashboard Counts Section-->
<section class="dashboard-counts no-padding-bottom">
  <div class="container-fluid">
    <div class="row bg-white has-shadow it">
      <!-- Item -->
      <div class="col-xl-4 col-sm-6">
        <div class="item d-flex align-items-center" id="money">
          <div class="icon bg-green"><i class="fa fa-money"></i></div>
          <div class="title"><span>Saldo<br>Disponible  </span>
            <div class="progress">
              <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
            </div>
          </div>
          <div class="number title"><strong>{{@$saldo}} $</strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-xl-4 col-sm-6">
        <div class="item d-flex align-items-center" id="deposito">
          <div class="icon bg-red"><i class="fa fa-dollar"></i></div>
          <div class="title">
            <a href="{{url('/Deposit')}}" class="link2"><span>Realizar<br>Depósitos</span></a>

            <div class="progress">
              <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-xl-4 col-sm-6">
        <div class="item d-flex align-items-center" id="tranf">
          <div class="icon bg-violet"><i class="fa fa-exchange"></i></div>
          <div class="title">
            <a href="{{url('/Transfer')}}"><span>Realizar<br>Transferencias</span></a>
            <div class="progress">
              <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>

<!-- PAGE CONTENT -->
<section class="tables">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h3 class="h4">Transferencias Recientes</h3>
          </div>
          <div class="card-body">
            @if($data == 1)
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Beneficiario</th>
                    <th>Cuenta</th>
                    <th>Correo del beneficiario</th>
                    <th>Cantidad transferida</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($transfers as $transfer)
                  <tr>
                    <th scope="row">{{$transfer->codigoTrans}}</th>
                    <td>{{$transfer->nombresB}} {{$transfer->apellidosB}}</td>
                    <td>{{$transfer->cuenta}}</td>
                    <td>{{$transfer->emailB}}</td>
                    <td>$ {{$transfer->cantidadB}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
                <center>{{$transfers->render()}}</center>
            </div>
            @elseif($data == 0)
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Beneficiario</th>
                    <th>Cuenta</th>
                    <th>Correo del beneficiario</th>
                    <th>Cantidad transferida</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($transferss as $transfer)
                  <tr>
                    <th scope="row">{{$transfer->codigoTrans}}</th>
                    <td>{{$transfer->nombresB}} {{$transfer->apellidosB}}</td>
                    <td>{{$transfer->cuenta}}</td>
                    <td>{{$transfer->emailB}}</td>
                    <td>$ {{$transfer->cantidadB}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <h4 class="right"> <small> <a href="{{url('tranfers/'.Auth::user()->id)}}"> Todas Transferencias</a></small></h4>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /PAGE CONTENT -->
@endsection
