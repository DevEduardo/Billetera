@extends('layouts.app')
@section('script')
{!! Charts::styles() !!}
{!! Charts::scripts() !!}
{!! $TransferChart->script() !!}
{!! $UserChart->script() !!}
@endsection
@section('content')
<section class="tables">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <center>
                {!! $TransferChart->html() !!}
            </center>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <center>
                {!! $UserChart->html() !!}
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection
