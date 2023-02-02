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
    {{-- <script>
        window.fbAsyncInit = function() {
            FB.init({
            appId            : '5669421129846478',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v15.0'
            }); 
        };
    </script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script> --}}
    
    @yield('footer')
</body>
</html>