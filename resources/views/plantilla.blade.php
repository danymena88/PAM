<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.svg">
    <title>@yield('titulo')</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.min.css'); }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<script src="{{ URL::asset('js/jquery.min.js'); }}"></script>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-lg">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="/">
                            <img src="{{ URL::asset('images/logo.png'); }}" class="img-fluid" style="max-width:180px;">
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    
                    
                    
                    <!-- <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a> -->

                            
                            <a class="nav-link dropdown-toggle d-lg-none me-2" href="javascript:void(0)" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" href="javascript:void(0)">
                                <img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ms-2 d-none d-lg-inline-block text-dark">{{ session('primerNombre')}} {{ session('primerApellido')}}<i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
                            <a class="dropdown-item" href="/admin"><i data-feather="clipboard"
                                    class="svg-icon me-2 ms-1"></i>
                                Panel</a>
                                <a href="/admin/cambio-contra" class="dropdown-item"><i data-feather="settings"
                                    class="svg-icon me-2 ms-1"></i>
                                Contraseña</a>
                                <div class="dropdown-divider"></div>
                                <form action="/logout" method="POST" class="d-flex" role="search">
                                    @csrf
                                    <button class="dropdown-item" type="submit"><i data-feather="power"
                                        class="svg-icon me-2 ms-1"></i>Logout</button>
                                </form>
                            </div>
                        
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                        
                    <ul class="navbar-nav float-end" style="width:100%;display:flex;flex-direction:row;justify-content:end;">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ms-2 d-none d-lg-inline-block text-dark">{{ session('primerNombre')}} {{ session('primerApellido')}}<i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="/admin"><i data-feather="clipboard"
                                        class="svg-icon me-2 ms-1"></i>
                                    Panel</a>
                                    <a href="/admin/cambio-contra" class="dropdown-item"><i data-feather="settings"
                                        class="svg-icon me-2 ms-1"></i>
                                    Contraseña</a>
                                <div class="dropdown-divider"></div>
                                <form action="/logout" method="POST" class="d-flex" role="search">
                                    @csrf
                                    <button class="dropdown-item" type="submit"><i data-feather="power"
                                        class="svg-icon me-2 ms-1"></i>Logout</button>
                                </form>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/admin"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        
                        <li class="list-divider"></li>
                        <?php
                        $resEnv = App\Models\GruposUsuarios::permisosGrupo(session('rol'), 'env');
                        $resmodEnv = App\Models\GruposUsuarios::permisosGrupo(session('rol'), 'modEnv');
                        $resuser = App\Models\GruposUsuarios::permisosGrupo(session('rol'), 'user');
                        $resmodUser = App\Models\GruposUsuarios::permisosGrupo(session('rol'), 'modUser');
                        $resestGlo = App\Models\GruposUsuarios::permisosGrupo(session('rol'), 'estGlo');
                        $resgest = App\Models\GruposUsuarios::permisosGrupo(session('rol'), 'gest');
                        $resgestGlo = App\Models\GruposUsuarios::permisosGrupo(session('rol'), 'gestGlo');
                        ?>
                        @if ($resEnv != 'N' or $resmodEnv != 'N' or $resuser != 'N' or $resmodUser != 'N' or $resestGlo != 'N' or $resgest != 'N')
                        <li class="nav-small-cap"><span class="hide-menu">Acciones</span></li>
                        @endif
                        @if ($resEnv == 'Y')
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="send" class="feather-icon"></i><span
                                    class="hide-menu">Envíos </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="/admin/envio" class="sidebar-link"><span
                                            class="hide-menu"> Hacer un envío
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="/admin/mis-envios" class="sidebar-link"><span
                                            class="hide-menu"> Mis envíos
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if ($resmodEnv == 'Y')
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="edit-2" class="feather-icon"></i><span
                                    class="hide-menu">Modificar envío </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="/admin/modificar-envio" class="sidebar-link"><span
                                            class="hide-menu"> Modificar
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if ($resuser == 'Y')
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span
                                    class="hide-menu">Usuarios </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="/admin/grupos" class="sidebar-link"><span
                                    class="hide-menu"> Grupos de Usuarios
                                </span></a>
                                </li>
                                <li class="sidebar-item"><a href="/admin/add-usuarios" class="sidebar-link"><span
                                            class="hide-menu"> Crear Usuarios
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if ($resmodUser == 'Y')
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="user" class="feather-icon"></i><span
                                    class="hide-menu">Actualizar Usuario </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="/admin/mod-user" class="sidebar-link"><span
                                    class="hide-menu"> Modificar Usuarios
                                </span></a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if ($resestGlo == 'Y')
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="search" class="feather-icon"></i><span
                                    class="hide-menu">Busquedas </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="/admin/busquedas" class="sidebar-link"><span
                                    class="hide-menu"> Buscar Envíos
                                </span></a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if ($resgest == 'Y')
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="layers" class="feather-icon"></i><span
                                    class="hide-menu">Gestión de Paquetes </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="/admin/gest-paquete" class="sidebar-link"><span
                                            class="hide-menu"> Gestionar
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if (session('rol') == 1)
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="hash" class="feather-icon"></i><span
                                    class="hide-menu">Códigos </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="/admin/codigos" class="sidebar-link"><span
                                            class="hide-menu"> Impresión
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        {{-- @if ($resestGlo == 'Y')
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="pie-chart" class="feather-icon"></i><span
                                    class="hide-menu">Estadísticas Globales</span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="http://127.0.0.1:8000/admin/glob-stats" class="sidebar-link"><span
                                            class="hide-menu"> Sucursales
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        @endif --}}
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Hola {{ session('primerNombre')}} {{ session('primerApellido')}}!</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">Sucursal: {{ session('sucursal')}}
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-end">
                            <h3 class="form-control bg-white border-0 custom-shadow custom-radius py-2 px-4"><?php echo $fecha; ?></h3>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @section('contenido')
                @show
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                PartsPlus ® <?php echo(date('Y')) ?>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    
    {{-- <script>
        
        


function cambioContrasena() {
                        let inputEn = $('#inp');
                    $.ajax({
                        url: "/admin/cambio-contra",
                        type: "GET",
                        data:{'con' : inputEn.val()},
                        success:function(data){
                            $('#nuevo-form').html(data);
                        }
                    });
                };
    </script> --}}
    <script src="{{ URL::asset('js/bootstrap.js'); }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js'); }}"></script>
    

    
    <!-- apps -->
    <!-- apps -->
    <script src="{{ URL::asset('js/dashboard/app-style-switcher.js'); }}"></script>
    <script src="{{ URL::asset('js/dashboard/feather.min.js'); }}"></script>
    <script src="{{ URL::asset('js/dashboard/sidebarmenu.js'); }}"></script>
    <script src="{{ URL::asset('js/dashboard/perfect-scrollbar.jquery.min.js'); }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ URL::asset('js/dashboard/custom.min.js'); }}"></script>
    <!--This page JavaScript -->
    
    <script src="{{ URL::asset('js/dashboard/dashboard1.min.js'); }}"></script>
</body>

</html>
















