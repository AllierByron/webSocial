@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('script')
    <!--API Geolocalización-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0SItd16EjZBPWLX2n5ZPoUFMITAhIyaw&callback=initMap"
    defer></script>
    <script src="{{ asset('js/map.js') }}"></script>
    <!--API Geolocalización-->
@endsection

@section('content')

    <br>
    <div class="sec-inicial">
        <h1 class="titulos">¡Contactanos!</h1>
    </div>

    <div class="cuerpo">
        <p>Test/Geolocalizacion</p>
        <div class="fila">
            <div class="columna">
                <!--Mapa-->
                <div id="map">
                    
                </div>
                <hr>
                <!--Imagen-->
                <img id="lugar" src="{{ asset('img/ImgLocal.png') }}" alt="Imagen satelital del local">
            </div>
            <hr class="vertical">
            <div class="columna">
                <!--Formulario-->

                <!--links&contactos-->
                <a href="#">Correo:2122200374@soy.utj.edu.mx</a><br>
                <a href="#">Facebook:</a><br>
                <a href="#">Twitter:</a><br>
                <h4>Telefono:##########</h4>
            </div>
        </div>

    </div>
    
@endsection

@section('footer')
    <!--Vacio-->    
@endsection