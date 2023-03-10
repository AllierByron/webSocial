@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">
    <style>
        i#like:hover{
            cursor: pointer; 
            color: red;
        }
        i#like{
            font-size:25px;
        }
        button#comments {
            border: none;
            color: white;
            text-align: center;
            display: inline-block;
            padding: 10px 10px 10px 10px;
            margin-top: 0;
            font-size: 16px;
            cursor: pointer;
            background-color: black;
        }
        button#comments:hover{
            background-color: red;
        }
        a{
            color: white;
        }
        #postear{
            padding: 10px;
            background-color:green;
            transition: background-color 1s;
            border-radius: 10px; 
        }
        #postear:hover{
            background-color:rgb(51, 98, 51);
        }
    </style>
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
                <br><br>
                @if(Auth::check())
                    @if(count(session('data')) != 0)
                        @foreach(session('data') as $d)
                            <div id="contenedor-post" style="min-height: 100px; width: 100%; display: inline-block;">
                                {{-- <div style="float: left; width: 50px; height: 50px; background-color:rgb(0, 0, 105); display: inline-block;"><img src="{{$d->foto_perfil}}" alt="" width= "50px" height="50px"></div> --}}
                                <div id="contendor-publicacion-de-comunidad" style="background-color:rgb(10, 0, 82); min-height: 100px; width: 100%; display: inline-block; float:right;">
                                    <div style="">
                                        <div id="header-publicacion" style="float:left; padding:10px; min-height: 40px; width: 87%; color:black;">
                                            <div style="font-size: 10px; color:rgb(213, 211, 211);">
                                                <p>{{$d->name}}   ||   <a href="{{$d->url}}">{{$d->nombre}}</a></p>
                                            </div>
                                            <div id="titulo" style="font-size: 25px;">
                                                <strong style="color:white;">{{$d->titulo}}</strong>   
                                            </div>
                                            @if($d->descripcion != null)
                                                <div id="Descripcion" style="color:white;">
                                                    {{$d->descripcion}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <br> --}}
                                    @if($d->contenido != null)
                                        <div id="contenido{{-- el contenido pueden ser imgs, videos, gifs, etc. Puede existir o no--}}" style="padding:20px 0px; margin:auto; width:100%; background-color:rgb(8, 0, 50); float:left; text-align:center;">
                                            <img src="{{url($d->contenido)}}" alt="" width="70%" height="70%"> 
                                        </div>
                                    @endif
                                    <div id="comentarios" style="padding:0px 0px 28px 0px; margin:auto; text-align:center; background-color:black; height:10px; float:left; width: 100%;">
                                        <button id="comments"><a href="{{route('pub',['id'=>$d->id])}}">Comentarios</a></button>
                                        <i class="fa fa-heart" id="like" style="padding:7px; float:right;"></i>
                                    </div>
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