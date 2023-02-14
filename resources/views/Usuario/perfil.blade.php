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
            @if(Auth::check()) 
                <img src="{{auth()->user()->foto_perfil}}" alt="avatar" id="foto">
                <h1 id="nombre">{{auth()->user()->name}}</h1>
                <a href="{{asset('editUserStuff')}}"><button id="btn-editarPerfil">Editar Perfil</button></a>
            @else 
                <div id="foto"></div>
                <h1 id="nombre">Nombre De Usuario</h1>
                {{-- <button id="btn-editarPerfil">Editar Perfil</button> --}}
            @endif
            <br><br>
            @if(Auth::check() && auth()->user()->facebook != null)
                <a href="{{auth()->user()->facebook}}" target="_blank">{{auth()->user()->name}}</a>
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