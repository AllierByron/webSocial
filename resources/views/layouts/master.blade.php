<!DOCTYPE html>
<html lang="en">
<head>
    @include('parts.head')
    @yield('css')
    @yield('script')
    <script src="{{ asset('js/anim.js') }}"></script>
    <title>RedSocial_Project</title>
</head>
<body>
    @include('parts.navbar')

    @yield('content')
    
    @yield('footer')
</body>
</html>