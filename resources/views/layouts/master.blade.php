<!DOCTYPE html>
<html lang="en">
<head>
    @include('parts.head')
    @yield('css')
    @yield('script')
    <title>RedSocial_Project</title>
</head>
<body>
    @include('parts.navbar')

    @yield('content')
    
    @yield('footer')
</body>
</html>