@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('script')
    <script src="https://www.paypal.com/sdk/js?client-id=Acu9ol5MF3N02fyg4A1bECbV1xq1CDJucLllRUi7iuxloWBwKR6qp1eWPXGRmnS0euqm17evX8w5dwhU"></script> {{--Llamada a la API de Paypal--}}
    <script src="{{ asset('js/ppl.js') }}"></script> {{--Script para mostrar el contenedor de los botones--}}
@endsection

@section('content')

    <br>
    <div class="sec-inicial">
        <h1 class="titulos">Configuración</h1>
    </div>

    <p></p>
    <div class="cuerpo">
        <div class="fila">
            {{-- Columna izquieda --}}
            <div class="columna">

                <h3>Cuenta Premium</h3>
                <button id="cVIP" class="btnH" onclick="PyPalBox(this)">Comprar</button> {{-- Boton para mostrar los metodos de pago --}}

                {{-- Contenedor de los metodos de pago --}}
                <div id="PBOX" class="dropdown-content-ext">
                    <h4>Pago</h4>

                    {{-- Llamada para mostrar los botones mediante el JavaScript SDK --}}
                    <div id="paypal-button-container">
                        <script>
                            paypal.Buttons().render('#paypal-button-container');
                        </script>
                    </div>
                    {{-- Llamada para mostrar los botones mediante el JavaScript SDK --}}

                </div>
                {{-- Contenedor de los metodos de pago --}}

            </div>
            <hr class="vertical">
            {{-- Columna derecha --}}
            <div class="columna">

            </div>
        </div>
    </div>

    
@endsection

@section('footer')
    @include('parts.footer')
@endsection