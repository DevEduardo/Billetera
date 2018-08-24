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
    {!! Html::style('assets/vendor/bootstrap/css/bootstrap.min.css') !!}
    <!-- Materialize CSS-->
    {!! Html::style('assets/css/materialize.css') !!}
    <!-- Font Awesome CSS-->
    {!! Html::style('assets/vendor/font-awesome/css/font-awesome.min.css') !!}
    <!-- Fontastic Custom icon font-->
    {!! Html::style('assets/css/fontastic.css') !!}
    <!-- theme stylesheet-->
    {!! Html::style('assets/css/style.green.css') !!}
    <!-- Custom stylesheet - for your changes-->
    {!! Html::style('assets/css/custom.css') !!}
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <!-- Javascript files-->
        {!! Html::script('assets/js/jquery-3.2.1.min.js') !!}
        {!! Html::script('assets/vendor/popper.js/umd/popper.min.js') !!}
        {!! Html::script('assets/vendor/bootstrap/js/bootstrap.min.js') !!}
        {!! Html::script('assets/vendor/jquery.cookie/jquery.cookie.js') !!}
        {!! Html::script('assets/vendor/jquery-validation/jquery.validate.min.js') !!}
        <!-- Main File-->
        {!! Html::script ('assets/js/front.js') !!}

        {!! Html::script('assets/js/materialize.min.js')!!}
          @yield('script')
  </head>
  <body>
    <div class="page login-page">
      @yield('content')
      <div class="copyrights text-center">
        <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
      </div>
    </div>

  </body>
</html>
