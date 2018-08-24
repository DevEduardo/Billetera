@extends('layouts.app')
@section('content')

<!-- PAGE CONTENT -->
<section class="tables">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-xs-4 offset-4">
        <div class="card">
        <div class="card-image">
          <img src="{{asset('storage/'.$user->di.'.jpg')}}">
          <span class="card-title">{{$user->name}}</span>
        </div>
        <div class="card-content">
          <p><small>Dpcumento de identificacion: </small> {{$user->di}}</p>
          <p><small>RIF:</small> {{$user->rif}}</p>
          <p><small>Telefono:</small> {{$user->phone}}</p>
        </div>
        <div class="card-action">
          <a href="{{url('admin/user/confir/'.$user->id)}}">Confirmar solicitud</a>
        </div>
      </div>
      </div>
    </div>
  </div>
</section>
<!-- /PAGE CONTENT -->
@endsection
