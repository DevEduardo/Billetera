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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        {!! Html::script('assets/js/validation.js')!!}
        {!! Html::script('assets/js/formularios.js')!!}
        {!! Html::script('assets/js/jquery.number.min.js')!!}
        {!! Html::script('assets/js/custom.js')!!}
        <!-- Main File-->
        {!! Html::script('assets/js/front.js') !!}
  @yield('script')

  </head>
  <body>

    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.html" class="navbar-brand">
                  <div class="brand-text brand-big"><strong><img src="{{asset('assets/img/cloudlogo2.png')}}" class="logo-sm"></strong></div>
                  <div class="brand-text brand-small"><strong><img src="{{asset('assets/img/favicon.png')}}" class="logo-xsm"></strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>

              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <li class="nav-item"><i class="fa fa-user"></i> {{Auth::user()->email}}</li>
                <li class="nav-item"><a href="{{url('/logout')}}" class="nav-link logout">Salir<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Navidation Menus<span class="heading">Main</span>-->
          @if(Auth::user()->rol == 1)
          <ul class="list-unstyled">
              <li id="i"><a href="{{url('/home')}}"> <i class="fa fa-home"></i>Inicio </a></li>
              <li id="cb"><a href="{{url('admin/users')}}"> <i class="fa fa-user"></i>Usuarios</a></li>
              <li id="a"><a href="{{url('admin/settings')}}" > <i class="fa fa-cog"></i>Ajustes </a></li>
          </ul>
          @else
          <ul class="list-unstyled">
              <li id="i"><a href="{{url('/home')}}"> <i class="fa fa-home"></i>Inicio </a></li>
              <li id="cb"><a href="{{url('/Bank')}}"> <i class="fa fa-bank"></i>Cuentas bancarias </a></li>
              <!-- <li id="t"><a href="#"> <i class="fa fa-credit-card"></i>Tarjetas </a></li> -->
              <li id="a"><a href="{{url('user/settings')}}" > <i class="fa fa-cog"></i>Ajustes </a></li>
          </ul>
          @endif

        </nav>
        <div class="content-inner">

          <!-- Page Header-->

          @yield('content')
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>Your company &copy; 2017-2019</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>

  </body>
</html>
