<div id="page-loader"><span class="preloader-interior"></span></div>
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
            <h3 class="h4">Tarjetas débit/credito Registradas </h3>
            @if($count >0)
            <i class="fa fa-plus link" data-toggle="modal" data-target="#tarjeta"></i>
            @endif
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                @if($count == 0)
                No posee ninguna tarjeta registrada <a href="#" data-toggle="modal" data-target="#tarjeta"> Registrar tarjeta</a>
                @else
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Numero de Tarjeta</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Accion</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cards as $card)
                  <tr>
                    <th scope="row">{{$card->id}}</th>
                    <td>{{$card->numero}}</td>
                    <td>{{$card->f_caducidad}}</td>
                    <td>
                      <a href="{{url('/Card/'.$card->id.'/delete')}}" class="link-1-mg-0" onclick="return confirm('deseas elimar la cuenta seleccionada?')"><i class="fa fa-trash"></i></a>
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
