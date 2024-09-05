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
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.svg">
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
                                <span class="ms-2 d-none d-lg-inline-block text-dark">{{ session('username')}} <i data-feather="chevron-down"
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
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Hola {{ session::get('username')}}!</h3>
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
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Agregar Curso</h4>
                                <h6 class="card-subtitle">Llena los campos solicitados para agregar un curso en <code style="color:blueviolet; font-size: 1rem;">Codeffee</code>.</h6>
                                <form class="mt-4" action="acciones-cursos" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nombre" required>
                                        <small id="name" class="form-text text-muted">Ingresa el nombre del curso</small>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input class="form-control" maxlength="49" name="descripcion" required>
                                        <small id="name" class="form-text text-muted">Descripción del curso</small>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-12">
                                            <input class="form-control" maxlength="49" name="enlace" required>
                                            <small id="name" class="form-text text-muted">Enlace de la imagen</small>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-6 col-md-4">
                                            <input type="number" class="form-control" name="capitulos" value="1">
                                            <small id="name" class="form-text text-muted">Cantidad de capítulos</small>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <input type="number" class="form-control" name="precio" value="10">
                                            <small id="name" class="form-text text-muted">Precio</small>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="isactive" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Si</label>
                                            </div>
                                            <small id="name" class="form-text text-muted">¿Curso activo?</small>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-info">Agregar</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>







                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Eliminar Curso</h4>
                                <h6 class="card-subtitle">Selecciona el curso a eliminar:</h6>
                                <form class="mt-4" action="eliminar-curso" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <select class="form-select" id="inputGroupSelect04" name="id">
                                          <option selected value="off">Selecciona...</option>
                                          @foreach ($cursos as $curso)
                                          <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                                          @endforeach
                                        </select>
                                        <button class="btn btn-outline-secondary" type="submit">
                                          Eliminar
                                        </button>
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
            @if (session('resultado') == 'S')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header bg-primary text-white">
                    <i data-feather="thumbs-up" class="feather-icon me-3"></i>
                    <strong class="me-auto">Codeffee</strong>
                    <small>hace un momento...</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body bg-primary text-white">
                    Operación realizada con éxito!.
                    </div>
                </div>
                </div>
                                @endif
                                @if (session('resultado') == 'N')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header bg-primary text-white">
                    <i data-feather="thumbs-down" class="feather-icon me-3"></i>
                    <strong class="me-auto">Codeffee</strong>
                    <small>hace un momento...</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body bg-primary text-white">
                    Ya existe un curso con ese nombre!.
                    </div>
                </div>
                </div>
                @endif
                @if (session('resultado') == 'E')
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header bg-primary text-white">
                    <i data-feather="thumbs-down" class="feather-icon me-3"></i>
                    <strong class="me-auto">Codeffee</strong>
                    <small>hace un momento...</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body bg-primary text-white">
                    El curso fue eliminado!.
                    </div>
                </div>
                </div>
                @endif
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved by Freedash. Designed and Developed by <a
                    href="https://adminmart.com/">Adminmart</a>.
            </footer>
            <!-- ============================================================ -->
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
    <script src="{{ URL::asset('js/bootstrap.js'); }}"></script>
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