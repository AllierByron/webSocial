@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('script')
@endsection

@section('content')

    <div id="muro"><img src="" alt="Foto de Muro"></div>

    <div class="row">
        <div id="user" class="columnas"><!--izquierda-->
            @if(Auth::check()) <img src="{{auth()->user()->foto_perfil}}" alt="avatar" id="foto">
            @else <div id="foto"></div>
            @endif
            <h1 id="nombre">Nombre De Usuario</h1>
            <br><br>
            @if(!is_null(auth()->user()) && Auth::check())
                <a href="https://www.facebook.com/search/people/?q={{auth()->user()->facebook}}" target="_blank">{{auth()->user()->facebook}}</a>
            @endif
        </div>

        <div id="cont" class="columnas">   <!--centro-->
            <div id="filtros">
                <select name="likes" id="" class="likes">
                    <option value="0">Mas Likes</option>
                    <option value="1">Menos Likes</option>
                </select>
                <label class="filtro" for="likes" style="float: left;">Filtar por: </label>

            </div>
        </div>

        <div id="extra" class="columnas"><!--derecha-->
            <p id="t-extra">Contenido Destacado</p>
        </div>
    </div>
    
@endsection

@section('footer')
    @include('parts.footer')
@endsection