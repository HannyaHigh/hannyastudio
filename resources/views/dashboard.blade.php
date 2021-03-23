<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('../assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('../assets/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Hannya Studio.
  </title>

  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('../assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>


</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="#" class="simple-text logo-normal">
          Hannya Studio
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="{{route('dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Inicio</p>
            </a>
          </li>
          <li class="nav-item active dropodown">
            <a class="nav-link" href="#" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">person</i>
              <p>Formulario</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
              <a class="dropdown-item" href="{{route('users')}}">Users</a>
              <a class="dropdown-item" href="{{route('cliente')}}">Clients</a>
              <a class="dropdown-item" href="{{route('servicio')}}">Services</a>
              <a class="dropdown-item" href="{{route('contacto')}}">Contact</a>
              <a class="dropdown-item" href="{{route('galeria')}}">Galery</a>
            </div>
          </li>
          <li class="nav-item active dropodown">
            <a class="nav-link" href="#" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">content_paste</i>
              <p>Reporte</p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
              <a class="dropdown-item" href="{{route('usersreports')}}">User Reports</a>
              <a class="dropdown-item" href="{{route('reportecliente')}}">Client reports</a>
              <a class="dropdown-item" href="{{route('reporteservicio')}}">Service Reports</a>
              <a class="dropdown-item" href="{{route('reportecontacto')}}">Contact Reports</a>
              <a class="dropdown-item" href="{{route('reportegaleria')}}">Galery Reports</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand">Universidad Tecnólogica del Valle de Toluca</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="search" value="" class="form-control" placeholder="Buscar...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Cuenta
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Perfil</a>
                  <a class="dropdown-item" href="#">Ajustes</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->





      @yield('contenido')

    </div>


    <!--   Core JS Files   -->
    <script src="{{asset('../assets/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('../assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('../assets/js/core/bootstrap-material-design.min.js')}}"></script>
    <script src="{{asset('../assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('../assets/js/material-dashboard.js?v=2.1.2')}}" type="text/javascript"></script>


</body>

</html>