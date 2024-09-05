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
                                <span class="ms-2 d-none d-lg-inline-block text-dark">{{ session('primerNombre')}} {{ session('primerApellido')}} <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"
                                        class="svg-icon me-2 ms-1"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="/"><i data-feather="credit-card"
                                        class="svg-icon me-2 ms-1"></i>
                                    Home</a>
                                <a class="dropdown-item" href="/admin"><i data-feather="mail"
                                        class="svg-icon me-2 ms-1"></i>
                                    Dashboard</a>
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
                                aria-expanded="false"><i data-feather="code" class="feather-icon"></i><span
                                    class="hide-menu">Cursos </span></a>
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
                        <li class="sidebar-item  selected"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span
                                    class="hide-menu">Usuarios </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="http://127.0.0.1:8000/admin/ver-usuarios" class="sidebar-link"><span
                                            class="hide-menu"> Ver Usuarios
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="http://127.0.0.1:8000/admin/usuarios-acciones" class="sidebar-link"><span
                                            class="hide-menu"> Acciones
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="video" class="feather-icon"></i><span
                                    class="hide-menu">Capítulos </span></a>
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
                                <ol class="breadcrumb m-0 p-0">
                                        <li class="breadcrumb-item"><span>Administrador</span>
                                    </li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-primary text-center">
                                                <h1 class="font-light text-white">45</h1>
                                                <h6 class="text-white">Total de Usuarios</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-cyan text-center">
                                                <h1 class="font-light text-white">43</h1>
                                                <h6 class="text-white">Administradores</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-success text-center">
                                                <h1 class="font-light text-white">56</h1>
                                                <h6 class="text-white">Usuarios</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                </div>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Rol</th>
                                                <th>Agregado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($usuarios as $usuario)
                                            <tr>
                                                <td><span class="fs-6">{{ $usuario->id; }}</span></td>
                                                <td>{{ $usuario->name; }}</td>
                                                <td>{{ $usuario->email; }}</td>
                                                <td><?php
                                                if ($usuario->id_rol == 1)
                                                {
                                                    echo 'Administrador';
                                                }
                                                else {
                                                    echo 'Usuario';
                                                }
                                                ?></td>
                                                <td>{{ $usuario->created_at; }}</td>
                                            </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body mt-3">
                                <h4 class="card-title">Agregar Usuario</h4>
                                <form action="admin/adduser" method="POST">
                                    <div class="form-body">
                                        <div class="form-group mb-3 mt-4 row">
                                            <label class="col-md-2">Datos Generales</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" required placeholder="Primer Nombre">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Tercer Nombre">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Segundo Nombre">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" required placeholder="Primer Apellido">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Apellido de Casada">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" placeholder="Segundo Apellido">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">   
                                                <div class="col-sm-12 col-md-3">                                                        
                                                    <p>Género</p>
                                                    <fieldset class="radio">
                                                        <label for="radio1">
                                                            <input type="radio" name="radio" value="" checked="">Masculino</label>
                                                    </fieldset>
                                                    <fieldset class="radio">
                                                        <label>
                                                            <input type="radio" name="radio" value="">Femenino</label>
                                                    </fieldset> 
                                                </div>
                                                <div class="col-sm-12 col-md-5">
                                                            <p>Correo Electrónico</p>
                                                                <div class="form-group">
                                                                    <input type="email" required class="form-control" placeholder="abc@example.com">
                                                                </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <p>Contraseña</p>
                                                        <div class="form-group">
                                                            <input type="text" required class="form-control" placeholder="Contraseña">
                                                        </div>
                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 mt-5 row">
                                            <label class="col-md-2">Datos de Trabajo</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-4">
                                                                <p>Grupo de Usuarios</p>
                                                                    <div class="form-group mb-4">
                                                                        <select class="form-select mr-sm-2">
                                                                            <option selected="">Selecciona</option>
                                                                            @foreach ($gruposDeUsuarios as $grupo)
                                                                            <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                                                                            @endforeach
                                                                          </select>
                                                                    </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <p>Puesto de Trabajo</p>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Ej.: Asistente de Gerencia">
                                                            </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <p>Sucursal</p>
                                                            <div class="form-group mb-4">
                                                                <select class="form-select mr-sm-2">
                                                                    <option selected="">Selecciona</option>
                                                                    @foreach ($sucursales as $sucursal)
                                                                    <option value="{{ $sucursal->id }}">{{ $sucursal->nombreSucursal }}</option>
                                                                    @endforeach
                                                                  </select>
                                                            </div>
                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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