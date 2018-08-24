<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Billetera</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    {!! Html::style('assets/vendor/bootstrap/css/bootstrap.css') !!}
    <!-- Bootstrap CSS-->
    {!! Html::style('assets/css/materialize.css') !!}
    <!-- Font Awesome CSS-->
    {!! Html::style('assets/vendor/font-awesome/css/font-awesome.min.css') !!}
    <!-- Fontastic Custom icon font-->
    {!! Html::style('assets/css/fontastic.css') !!}
    <!-- theme stylesheet-->
    {!! Html::style('assets/css/style.green.css') !!}
    <!-- Custom stylesheet - for your changes-->
    {!! Html::style('assets/css/custom.css') !!}
    <!-- Loader-->
    {!! Html::style('assets/plugin/loader/css/introLoader.min.css')!!}
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

        <!-- Javascript files-->
        {!! Html::script('assets/js/jquery-3.2.1.min.js') !!}
        {!! Html::script('assets/vendor/popper.js/umd/popper.min.js') !!}
        {!! Html::script('assets/js/materialize.min.js')!!}
        {!! Html::script('assets/vendor/jquery.cookie/jquery.cookie.js') !!}
        {!! Html::script('assets/vendor/jquery-validation/jquery.validate.min.js') !!}
        {!! Html::script('assets/plugin/loader/js/jquery.introLoader.pack.min.js')!!}
        {!! Html::script('assets/js/formularios.js')!!}
        {!! Html::script('assets/js/custom.js')!!}
        <!-- Main File-->
        {!! Html::script('assets/js/front.js') !!}
  @yield('script')

  </head>
  <body>
    <div class="page">
      <div class="page-content d-flex align-items-stretch">
        <div class="content-inner">
          @yield('content')
        </div>
      </div>
    </div>
  </body>
</html>
