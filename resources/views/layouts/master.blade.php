<!DOCTYPE html>
<html lang="en">
<head>
    @include('parts.head')
    @yield('css')
    @yield('script')
    <title>RedSocial_Project</title>
</head>
<body>
    @php
        session_start();
        $_SESSION['id-sesion']  = "";//= "1";
        //session_unset();
    @endphp
    @include('parts.navbar')
    
    

    @yield('content')

    @yield('scriptsv2'){{--puse este 2dp yield para el JS que necesita que todo el doc cargue --}}
    @php if(session('error')){echo '<script> document.getElementById("Inicio-sesion").click(); </script>';} @endphp
    @yield('footer')
</body>
</html>