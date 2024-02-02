<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>@yield('titulo')</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico')}}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('assets/js/config.js')}}"></script>
    <script src="/../vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/theme-rtl.min.css')}}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('assets/css/theme.min.css')}}" rel="stylesheet" id="style-default">
    <link href="{{ asset('assets/css/theme.css')}}" rel="stylesheet" id="style-default">
    <link href="{{ asset('assets/css/user-rtl.min.css')}}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('assets/css/user.min.css')}}" rel="stylesheet" id="user-style-default">
    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div style="padding-left: 30px;padding-right: 80px" >
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
          <script>
            var navbarStyle = localStorage.getItem("navbarStyle");
            if (navbarStyle && navbarStyle !== 'transparent') {
              document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
            }
          </script>
          <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper">

              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

            </div><a class="navbar-brand" href=".">
              <div class="d-flex align-items-center py-3"><img class="me-1" src="." alt="" width="10" /><span class="font-sans-serif">S & Q</span>
              </div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
              <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                  <li class="nav-item">
                    <!-- parent pages-->
                    <a class="nav-link " href="{{route('home')}}" role="button" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span>
                        <span class="nav-link-text ps-1">Principal</span>
                      </div>
                    </a>
                  </li>

                  <li class="nav-item">
                    <!-- label-->
                      <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Almacen</div>
                        <div class="col ps-0">
                          <hr class="mb-0 navbar-vertical-divider"/>
                        </div>
                      </div>
                    <!-- parent pages-->
                      <a class="nav-link" href="{{route('categoria.index')}}" role="button" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                          <span class="fas fa-calendar-alt"></span></span><span class="nav-link-text ps-1">Categorias</span>
                        </div>
                      </a>

                        {{-- <!-- parent pages-->
                        <a class="nav-link" href="{{route('producto.index')}}" role="button"  aria-expanded="false" >
                          <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span class="fas fa-shapes"></span></span><span class="nav-link-text ps-1">Productos</span>
                          </div>
                        </a> --}}
                        <!-- parent pages-->
                        <a class="nav-link dropdown-indicator" href="#id" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="id">
                              <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span class="fas fa-shopping-cart"></span></span><span class="nav-link-text ps-1">Productos</span>
                              </div>
                        </a>
                        <ul class="nav collapse false" id="id">
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('producto.index')}}" role="button" aria-expanded="false" aria-controls="id">
                              <div class="d-flex align-items-center"><span class="fas fa-shapes"></span><span class="nav-link-text ps-1">Registro de Productos</span>
                              </div>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('productos.index')}}" role="button" aria-expanded="false" aria-controls="id">
                              <div class="d-flex align-items-center"><span class="fas fa-table"></span><span class="nav-link-text ps-1">Listado de Productos</span>
                              </div>
                            </a>
                          </li>
                        </ul>

                       
                  </li>

                  <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                      <div class="col-auto navbar-vertical-label">Clientes
                      </div>
                      <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                      </div>
                    </div>
                    <a class="nav-link" href="{{route('cliente.index')}}" role="button" aria-expanded="false" >
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user"></span></span><span class="nav-link-text ps-1">Registro de Clientes</span>
                      </div>
                    </a>
                  </li>

                  <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                      <div class="col-auto navbar-vertical-label">Operaciones
                      </div>
                      <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                      </div>
                    </div>
                    <!-- parent pages--><a class="nav-link" href="{{route('venta.index')}}" role="button"  aria-expanded="false" >
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-map"></span></span><span class="nav-link-text ps-1">Realizar Ventas</span>
                      </div>
                    </a>
                  </li>



                  {{-- <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                      <div class="col-auto navbar-vertical-label">Reportes
                      </div>
                      <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                      </div>
                    </div>
                    <!-- parent pages--><a class="nav-link dropdown-indicator" href="#forms" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                      <div class="d-flex align-items-center">
                        <span class="nav-link-icon"><span class="fas fa-file-alt"></span></span><span class="nav-link-text ps-1">Documento PDF</span>
                      </div>
                    </a>
                    <ul class="nav collapse false" id="forms">
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('descargarPDF')}}" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                              <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Reporte Categorias</span>
                              </div>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link " href="{{route('descargarPDFP')}}" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Reporte Productos</span>
                            </div>
                          </a>
                        </li>
                          <li class="nav-item">
                            <a class="nav-link " href="{{route('descargarPDFC')}}" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">REporte Clientes</span>
                            </div>
                          </a>
                        </li>
                    </ul>
                   
                  </li> --}}
            </div>
          </div>
        </nav>
        <div class="content">
          
          <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">
            {{-- <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="index.html">
              <div class="d-flex align-items-center"><img class="me-2" src="assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span class="font-sans-serif">falcon</span>
              </div>
            </a> --}}
            <ul class="navbar-nav align-items-center d-none d-lg-block">
              <li class="nav-item">
                <div class="search-box" data-list='{"valueNames":["title"]}'>
                  <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                    <input class="form-control search-input a " type="search" placeholder="Buscar..." aria-label="Search" />
                    <span class="fas fa-search search-box-icon"></span>

                  </form>
                  <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none" data-bs-dismiss="search">
                    <div class="btn-close-falcon" aria-label="Close"></div>
                  </div>

                </div>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
              <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2">
                  <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" />
                  <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left"><span class="fas fa-sun fs-0"></span></label>
                  <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" ><span class="fas fa-moon fs-0"></span></label>
                </div>
              </li>
              <li class="nav-item">
                <span class="bi bi-person" data-fa-transform="shrink-7" style="font-size: 33px;"></span>
              </li>

              <li class="nav-item dropdown"><a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="avatar avatar-l">

                    {{-- <img class="rounded-circle" src="assets/img/team/3-thumb.png" alt="" />   --}}
                    {{ Auth::user()->name }}

                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                  <div class="bg-white dark__bg-1000 rounded-2 py-2">
                    <a class="dropdown-item" href="">Perfil</a>
                    <div class="dropdown-divider"></div>
                    {{-- <a class="dropdown-item" href="pages/authentication/card/logout.html">Cerrar Sesion</a>   --}}

                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                          Cerrar Sesion
                        </a>
                      </form>


                  </div>
                </div>
              </li>
            </ul>
          </nav>
          <br>
          {{-- <div class="container-fluid card mb-3">
            <section class="content">
                @yield('contenido')
            </section>
          </div> --}}
          <div class="content card mb-3">

            @yield('contenido')
          </div>
        </div>
        
      
      </div>
    </main>



<!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('vendors/popper/popper.min.js')}}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendors/anchorjs/anchor.min.js')}}"></script>
    <script src="{{ asset('vendors/is/is.min.js')}}"></script>
    <script src="{{ asset('vendors/echarts/echarts.min.js')}}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js')}}"></script>
    <script src="{{ asset('vendors/lodash/lodash.min.js')}}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('vendors/list.js/list.min.js')}}"></script>
    <script src="{{ asset('assets/js/theme.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  </body>
  @yield('script')

</html>