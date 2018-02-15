<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/portal.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/3.3.7/js/bootstrap.min.js"></script>
    <title>@yield('title')</title>
</head> 
<body>
<div class="wrapper navbar-fixed-top" >
    <h1 class="judul"><strong>HijauHRM</strong></h1>
        <div class="link">
            <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="/kategori/1">pinkkyNews</a></li>
                <li><a href="/kategori/2">pinkkyHot</a></li>
                <li><a href="/kategori/3">pinkkyHealth</a></li>
                <li><a href="/kategori/5">pinkkyTravel</a></li>
                <li><a href="/kategori/6">pinkkyOto</a></li>
                <li><a href="/tambah">MASUK</a></li>
            </ul>
        </div>
</div>
    <div class="content" style="margin-top:155px">
    @yield('content')
    </div>

</body>
</html>