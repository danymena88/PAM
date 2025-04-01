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
    <div style="display:flex; flex-wrap: wrap;">
    @foreach ($listaCodigos as $key=>$codigo)
    <div style="border: black solid 1px; padding: 1rem 4rem 1rem 4rem; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 250px;"><p style="margin-bottom: 0; font-size: 2rem;">{{ $codigo->codigo }}</p><p style="font-family: 'code128'; font-size: 80px; color: black; margin-bottom: 0;">{{ $codigo->codigo }}</p></div>
    @endforeach
</div>
</body>

</html>
















