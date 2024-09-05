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
    <title>Panel Administrador</title>
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
                            <img src="http://127.0.0.1:8000/images/logo.png" alt="" class="img-fluid">
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
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
                                <a class="dropdown-item" href="/"><i data-feather="credit-card"
                                        class="svg-icon me-2 ms-1"></i>
                                    Home</a>
                                <a class="dropdown-item" href="/admin"><i data-feather="mail"
                                        class="svg-icon me-2 ms-1"></i>
                                    Panel</a>
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
                        <li class="nav-small-cap"><span class="hide-menu">Acciones</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="package" class="feather-icon"></i><span
                                    class="hide-menu">Paquetes </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="http://127.0.0.1:8000/admin/ver-cursos" class="sidebar-link"><span
                                            class="hide-menu"> Ver Cursos
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="http://127.0.0.1:8000/admin/acciones-cursos" class="sidebar-link"><span
                                            class="hide-menu"> Acciones
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span
                                    class="hide-menu">Usuarios </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="http://127.0.0.1:8000/admin/grupos" class="sidebar-link"><span
                                    class="hide-menu"> Grupos de Usuarios
                                </span></a>
                                </li>
                                <li class="sidebar-item"><a href="http://127.0.0.1:8000/admin/add-usuarios" class="sidebar-link"><span
                                            class="hide-menu"> Crear Usuarios
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="http://127.0.0.1:8000/admin/add-usuarios" class="sidebar-link"><span
                                    class="hide-menu"> Modificar Usuarios
                                </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="hash" class="feather-icon"></i><span
                                    class="hide-menu">Códigos </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="http://127.0.0.1:8000/admin/capitulos-acciones" class="sidebar-link"><span
                                            class="hide-menu"> Acciones
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="bar-chart" class="feather-icon"></i><span
                                    class="hide-menu">Estadísticas </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="http://127.0.0.1:8000/admin/capitulos-acciones" class="sidebar-link"><span
                                            class="hide-menu"> Acciones
                                        </span></a>
                                </li>
                            </ul>
                        </li>
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
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">45</h2>
                                             </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total de Usuarios
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                                class="set-doller"></sup>45</h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total de Ventas
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">43</h2>
                                            </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total de Cursos
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- *************************************************************** -->
                <!-- End First Cards -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Top Leader Table -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Resumen de ventas</h4>
                                            <h6 class="card-subtitle">Aquí encontrarás todas las ventas realizadas en <code style="color:blueviolet; font-size: 1rem;">Codeffee</code>.</h6>
                                           
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Usuario</th>
                                                <th>Id de Venta</th>
                                                <th>Curso</th>
                                                <th>Pago</th>
                                                <th>Finaliza</th>
                                            </tr>
                                        </thead>
                                        <tbody id="search_list">
                                            {{-- @foreach ($ventas as $venta)
                                            <tr>
                                                <td><span class="fs-6">{{ $venta->created_at; }}</span></td>
                                                <td>{{ $venta->name; }}</td>
                                                <td>{{ $venta->id; }}</td>
                                                <td>{{ $venta->nombre; }}</td>
                                                <td>{{ $venta->pago; }}</td>
                                                <td>{{ $venta->finaliza; }}</td>
                                                </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Top Leader Table -->
                <!-- *************************************************************** -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved by Freedash. Designed and Developed by <a
                    href="https://adminmart.com/">Adminmart</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ URL::asset('js/jquery.min.js'); }}"></script>
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