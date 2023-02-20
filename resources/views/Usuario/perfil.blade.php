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




                @if(Auth::check())
                    @if(count(session('data')) != 0)
                        @foreach(session('data') as $d)
                            <div id="contendor-publicacion-de-comunidad" style="background-color:white; margin:auto; min-height: 100px; min-width: 100%; display: inline-block;display: inline-block;">
                                <div>
                                    <div id="points" style="float:left; padding:10px; color:black;">
                                        <div id="upvote" >
                                            <i class="fa fa-arrow-up" id="upvote"></i>
                                        </div>
                                        <p style="text-align: center;">0</p>
                                        <div id="downvote" style="{{--background-color:blue;--}} width:100%;">
                                            <i class="fa fa-arrow-down" id="downvote"></i>
                                        </div>
                                    </div>
                            
                                    <div id="header-publicacion" style="float:left; padding:10px; {{--background-color:orange;--}} min-height: 40px; width: 87%; color:black;">
                                        <div style="font-size: 10px; color:gray;">
                                            <p>Nombre Usuario   ||    Nombre comunidad</p>
                                        </div>
                                        <div id="titulo" style="font-size: 25px;">
                                            <strong>{{$d->titulo}}</strong>   
                                        </div>
                                        @if($d->descripcion != null)
                                            <div id="Descripcion" style="{{--background-color:blue;width:100%;--}}">
                                                {{$d->descripcion}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                {{-- <br> --}}
                                @if($d->contenido != null)
                                    <div id="contenido{{-- el contenido pueden ser imgs, videos, gifs, etc. Puede existir o no--}}" style="padding:20px 0px; margin:auto; width:100%; background-color:rgb(237, 237, 237); float:left; text-align:center;">
                                        {{-- <img src="https://i.redd.it/n5wke2jnq5ga1.jpg" alt="" width="70%" height="70%">     --}}
                                        <img src="{{url($d->contenido)}}" alt="" width="70%" height="70%"> 
                                    </div>
                                @endif
                                <div id="comentarios" style="padding:0px 0px 28px 0px; margin:auto; text-align:center; background-color:black; height:10px; float:left; width: 100%;">
                                    <button><a href="{{asset('/pub/')}}">Comentarios</a></button>
                                </div>
                            </div>
                            <br><br><br>
                        @endforeach
                    @else
                        <h1>No se ha hecho ningun publicacion</h1>
                    @endif
                @endif





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