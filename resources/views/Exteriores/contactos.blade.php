@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('script')
    <!--API Geolocalización-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0SItd16EjZBPWLX2n5ZPoUFMITAhIyaw&callback=initMap"
    defer></script>
    <script src="{{ asset('map.js') }}"></script>
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
                    <!--iframe
                    width="376"
                    height="250"
                    style="border:0"
                    loading="lazy"
                    allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0SItd16EjZBPWLX2n5ZPoUFMITAhIyaw
                    &q=+
                    &center=20.7189905,-103.386793268
                    &zoom=18">
                    </iframe-->
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