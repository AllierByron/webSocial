@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">
    <style>
        i#upvote:hover{
            color: green;
            cursor: pointer; 
        }
        i#downvote:hover{
            cursor: pointer; 
            color: red;
        }
        i#upvote, i#downvote{
            font-size:36px;
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
        
    </style>
@endsection

@section('script')
@endsection

@section('content')

    <br>
    <div class="sec-inicial" >
        <h1 class="titulos">{{ session('forumName')}}</h1>
    </div>
    <br><br><br>
    <div class="row">
        <div id="1era-columna" class="columnas" style="background-color:transparent;"><!--izquierda-->
            {{-- <p> </p> --}}
        </div>
        <div id="cont"class="columnas" style="background-color:transparent;" >
            @foreach(session('memes') as $meme)
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
                                <strong>{{$meme->title}}</strong>   
                            </div>
                            <div id="Descripcion">
                            </div>
                        </div>
                    </div>
                    {{-- <br> --}}
                    <div id="contenido{{-- el contenido pueden ser imgs, videos, gifs, etc. Puede existir o no--}}" style="padding:20px 0px; margin:auto; width:100%; background-color:rgb(237, 237, 237); float:left; text-align:center;">
                        <img src="{{url($meme->url)}}" alt="" width="70%" height="70%">    
                        @php 
                            $url = explode("/",$meme->url);  
                            $urlR = explode("/",$meme->postLink);
                        @endphp
                    </div>
                    <div id="comentarios" style="padding:0px 0px 28px 0px; margin:auto; text-align:center; background-color:black; height:10px; float:left; width: 100%;">
                        <button id="comments"><a href="{{asset('/pub/'.$meme->title.'/'.$url[3].'/'.$meme->subreddit.'/'.$meme->author.'/'.$urlR[3])}}">Comentarios</a></button>
                    </div>
                </div>
                <br><br><br>
            @endforeach
         </div>
         <div id="extra" class="columnas" style="background-color:transparent;"><!--derecha-->
             <p> </p>
         </div>
    </div>


@endsection

@section('footer')
    <div class="row">
        @include('parts.footer')
    </div>
@endsection