<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/favicon.svg" type="image/gif">
    <title>Cursos</title>
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css'); }}">
    <link rel="stylesheet" href="{{ URL::asset('css/tabler-icons.css'); }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css'); }}">
</head>
<body>
    <!-------------------------------->
    <!----------Header Start---------->
    <!-------------------------------->
    <header class="main-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg py-0">
                <div class="container-fluid">
                    <div class="logo d-flex align-items-center justify-content-between">
                        <a class="navbar-brand py-0 me-0" href="#"><img src="http://127.0.0.1:8000/images/logo.png" alt=""></a>
                        <!-- mobile toggle -->
                        <a class="navbar-toggler d-block d-lg-none border-0 p-0" data-bs-toggle="offcanvas"
                            href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="29.995" height="21.494" viewBox="0 0 187 134">
                                <image width="187" height="134"
                                    xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAVCAYAAABR915hAAAArklEQVRIie3UMYoCQRBG4U9ZxkQXRETRxGhvtAfQQxh5JC/gHTyAgbEgCIIKsuvCSsEowqR2R/OCbrqr4fFDdTXa0+sGX9ijIS3/GGD7gVEpHCaWvjIM8Tfa+KmU09DCJcSrjEmfNCs3tbgWv4no6jn6OGUaIJ84hHiBTuVJWs4hXmKMY6bEXexCPKuUM1B/p1qcjOjqCQr8ZXT+xrJGL3PgY4hv5eGxpyQGSIHbHVCEGbsa//d/AAAAAElFTkSuQmCC" />
                            </svg>
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://127.0.0.1:8000/cursos">Cursos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://127.0.0.1:8000/admin">Panel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="http://127.0.0.1:8000/mas-reciente">Más Reciente</a>
                            </li>
                        </ul>
                        <div class="login d-lg-flex align-items-center">
                            @if (session('username') != null)
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <img src="/images/dashboard/profile-pic.jpg" alt="user" class="rounded-circle"
                                        width="40">
                                    <span class="ms-2 d-none d-lg-inline-block text-dark">{{ session('username')}} <i data-feather="chevron-down"
                                            class="svg-icon"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
                                    <a class="dropdown-item" href="http://127.0.0.1:8000/admin"><i data-feather="user"
                                            class="svg-icon me-2 ms-1"></i>
                                        Panel</a>
                                    <a class="dropdown-item" href="/"><i data-feather="credit-card"
                                            class="svg-icon me-2 ms-1"></i>
                                        Home</a>
                                    <div class="dropdown-divider"></div>
                                    <form action="/logout" method="POST" class="d-flex" role="search">
                                        @csrf
                                        <button class="dropdown-item" type="submit"><i data-feather="power"
                                            class="svg-icon me-2 ms-1"></i>Logout</button>
                                    </form>
                                </div>
                            </div>
                            @else
                                <a class="btn btn-primary bg-transparent sign-in" href="http://127.0.0.1:8000/login">Iniciar sesión</a>
                                <a class="btn btn-primary get-stared" href="http://127.0.0.1:8000/register">Registrarse</a>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-------------------------------->
    <!----------Header End------------>
    <!-------------------------------->

    <!-------------------------------->
    <!----------Mobile Sidebar Start---------->
    <!-------------------------------->
    <section class="offcanvas offcanvas-start "  tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">   
        <div class="offcanvas-header justify-content-between">
            <img src="../images/offcanvas-logo.svg" alt="">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"aria-label="Close">
                <img src="../images/icons/close-svgrepo-com.svg" alt="">
            </button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav mx-auto mb-4 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fs-5" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="#">Exchange</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="#">FAQ</a>
                </li>
            </ul>
            <div class="login d-lg-flex align-items-center">
                <a class="btn btn-primary sign-in fs-5 d-block bg-white text-black mb-3" href="/login">Sign in</a>
                <a class="btn btn-primary get-stared fs-5 d-block bg-white text-black" href="/register">Get Stared</a>
            </div>
        </div>
    </section>
    <!-------------------------------->
    <!----------Mobile Sidebar End---------->
    <!-------------------------------->


    <section class="site-content">
        <div class="container-fluid px-5 mb-5">
            <div class="row">
                    
                <!--<p id="search_list"></p>-->
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <div class="col-sm-12 col-md-12 col-lg-12 text-center my-5 py-5" style="color:blueviolet">
                    <h1>Lo sentimos ;(</h1><br>
                    <h1>No está autorizado...</h1>
            </div>                    
        </div>
        </div>
        
    <!-------------------------------->
    <!----------Footer Start---------->
    <!-------------------------------->
    <footer class="main-footer">
        <div class="container">
            <div class="footer-wrapper">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="footer-logo-content">
                            <div class="footer-logo">
                                <img src="images/footer-logo.svg" alt="">
                            </div>
                            <div class="footer-item-content">
                                <p class="text fs-7">
                                    Every informed person needs to know about Bitcoin
                                    because it might be one of the world’s most
                                    important developments.
                                </p>
                            </div>
                            <div class="socials-icon">
                                <ul class="d-flex align-items-center list-unstyled mb-0">
                                    <li>
                                        <a class="d-flex align-items-center justify-content-center rounded-circle text-decoration-none facebook-icon" href="#">
                                            <i class="ti ti-brand-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="d-flex align-items-center justify-content-center rounded-circle text-decoration-none twitter-icon" href="#">
                                            <i class="ti ti-brand-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="d-flex align-items-center justify-content-center rounded-circle text-decoration-none instagram-icon" href="#">
                                            <i class="ti ti-brand-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="d-flex align-items-center justify-content-center rounded-circle text-decoration-none youtube-icon" href="#">
                                            <i class="ti ti-brand-youtube"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer-link-list">
                            <h5 class="footer-title fw-normal">Usefull Link</h5>
                            <ul class="list-unstyled mb-0">
                                <li><a class="text-decoration-none fs-7" href="#">Ios apps</a></li>
                                <li><a class="text-decoration-none fs-7" href="#">Contact Us</a></li>
                                <li><a class="text-decoration-none fs-7" href="#">Terms & Condition</a></li>
                                <li><a class="text-decoration-none fs-7" href="#">Privecy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="footer-contact-us">
                            <h5 class="footer-title fw-normal">Contact Us</h5>
                            <div class="call">
                                <a class="text-decoration-none d-flex align-items-center" href="tel:(406)555-0120">
                                    <img src="images/footer/call.svg" alt="">
                                    (406) 555-0120
                                </a>
                            </div>
                            <div class="mailto">
                                <a class="text-decoration-none d-flex align-items-center" href="mailto:tim.jennings@example.com">
                                    <img src="images/footer/mail.svg" alt="">
                                    tim.jennings@example.com
                                </a>
                            </div>
                            <div class="address">
                                <p class="text mb-0 fs-7 d-flex align-items-center">
                                    <img src="images/footer/home.svg" alt="">
                                    Elgin St. Celina, Delaware 10299
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-text text-center">
            <p class="text mb-0">@2023 - All Rights Reserved by <a href="https://adminmart.com/" class="primary-text text-decoration-none">adminmart.com</a></p>
        </div>
    </footer>
    <!-------------------------------->
    <!----------Footer Start---------->
    <!-------------------------------->
    
    <!----------Js Links---------->
    <script src="{{ URL::asset('js/jquery.min.js'); }}"></script>
    <script src="{{ URL::asset('js/owl.carousel.min.js'); }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js'); }}"></script>
    <script src="{{ URL::asset('js/custom.js'); }}"></script>
    <script src="{{ URL::asset('js/dashboard/feather.min.js'); }}"></script>
</body>
</html>