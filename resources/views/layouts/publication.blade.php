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
        button {
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
        button:hover{
            background-color: red;
        }
        #cont{
            width: 55%;
        }
    </style>
@endsection

@section('script')
    <script>
        function lotoco(){

        }
    </script>
@endsection

@section('content')
    <br>
    <div class="sec-inicial" >
        <h1 class="titulos">{{$post[0]->nombre}}</h1>
    </div>
    <br><br><br>
    <div class="row">
        <div id="1era-columna" class="columnas" style="background-color:transparent;""><!--izquierda-->
            <p> </p>
        </div>
        <div id="cont"class="columnas" style="background-color:transparent;" >
            <div id="contenedor-post" style="min-height: 100px; width: 100%; display: inline-block;">
                <div style="float: left; width: 50px; height: 50px; background-color:rgb(0, 0, 105); display: inline-block;"><img src="{{$post[0]->foto_perfil}}" alt="" width= "50px" height="50px"></div>
                <div id="contendor-publicacion-de-comunidad" style="background-color:rgb(10, 0, 82); min-height: 100px; width: 92%; display: inline-block; float:right;">
                    <div style="">
                        <div id="header-publicacion" style="float:left; padding:10px; min-height: 40px; width: 87%; color:black;">
                            <div style="font-size: 10px; color:rgb(213, 211, 211);">
                                <p>{{$post[0]->name}}</p>
                            </div>
                            <div id="titulo" style="font-size: 25px;">
                                <strong style="color:white;">{{$post[0]->titulo}}</strong>   
                            </div>
                            @if($post[0]->descripcion != null)
                                <div id="Descripcion" style="color:white;">
                                    {{$post[0]->descripcion}}
                                </div>
                            @endif
                        </div>
                    </div>
                    {{-- <br> --}}
                    @if($post[0]->contenido != null)
                        <div id="contenido{{-- el contenido pueden ser imgs, videos, gifs, etc. Puede existir o no--}}" style="padding:20px 0px; margin:auto; width:100%; background-color:rgb(8, 0, 50); float:left; text-align:center;">
                            <img src="{{url($post[0]->contenido)}}" alt="" width="70%" height="70%"> 
                        </div>
                    @endif
                </div>
            </div>
            <div>
                <h2>Comentarios</h2>

                <form action="{{asset('/crComment/2/'.$post[0]->id)}}">
                    @csrf
                    <textarea name="comment" id="comment" cols="100" rows="10" style="resize: none;" required></textarea>
                    <button type="submit">Comentar</button>
                </form>
                <br><br>
                @if($comments !== null)
                    @if(count($comments) != 0)
                        @foreach($comments as $comment)
                            @for ($i = 1; $i < count($comment->comentarios); $i++)
                                @php $commentSingle = $comment->comentarios[$i] @endphp
                                <strong><p>{{$comment->nombre}}</p></strong>
                                <p>{{$commentSingle}}</p>
                                <br><br>
                            @endfor
                        @endforeach
                    @else
                        No se ha comentado nada!
                    @endif
                @else
                    No se ha comentado nada!
                @endif
            </div>
        </div>
         <div id="extra" class="columnas" style="background-color:transparent;"><!--derecha-->
             <p></p>
         </div>
    </div>
@endsection

@section('footer')
    <div class="row">
        @include('parts.footer')
    </div>
@endsection