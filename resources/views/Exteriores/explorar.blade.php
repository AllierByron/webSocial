@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        #my-div {
            background-color: black;
            width: 200px;
            height: 200px;
            border: 2px solid white;
            color:white;
        }
        #my-div:hover {
            background-color: rgb(71, 71, 71);
            transition: background-color 0.5s;
        }
        #my-div:not(:hover) {
            background-color: black;
            transition: background-color 0.5s;
        }
        a.fill-div {
            display: flexbox;
            height: 100%;
            width: 100%;
            text-decoration: none;
        }
        #CC{
            color:white;
        }

        #CC:hover{
            color: blue;
        }
    </style>
@endsection

@section('script')
@endsection

@section('content')

    <br>
    <div class="sec-inicial">
        <h1 class="titulos">Explorar</h1>
    </div>
    <br>
    <div>
        <div id="1era-columna" class="row">
            <div class="columnas" >
                
            </div>
            <div id="cont" class="columnas" style="background-color: transparent;">{{--centro--}}
                <div>
                    <h2 style="float: left;">Comunidades Destacadas</h2>
                    @if(Auth::check())
                        <a href="{{asset('/defineForum')}}" id="CC" style="float: right;">Crear Comunidad</a>
                    @endif
                </div>
                <br><br>
                
                @if(count($foros) != 0) 
                    @foreach ($foros as $foro)
                        {{-- la comunidad de memes es generada por una api, por lo tanto esta necesita obtener su informacion de otro lado
                        que no es la base de datos. Con la variable opc logro definir a que parte del controlador se tiene que ir la
                        consulta --}}
                        @php $opc = 2;if($foro->nombre == 'Memes'){$opc = 1;} @endphp
                        <br><br>
                        <div id="my-div" style="width: 100%; border-radius: 80px; height:100px; padding:0px 0px 0px 0px;">
                            <a href="{{asset('/forum/'.$opc.'/'.$foro->id)}}" class="fill-div" style="color:white;">
                                <h3 style="margin-left:40px;">{{$foro->nombre}}</h3>
                                <p style="margin-left:40px;">{{$foro->descripcion}}, id: {{$foro->id}}</p>
                            </a>
                        </div>
                    @endforeach
                @elseif(count($foros) == 0)
                    <h1>No hay comunidades</h1>
                @endif
            </div>
            <div id="extra" class="columnas" style="backgroun-color:green;">
                
            </div>
        </div>
    </div>
    
@endsection

@section('footer')
    @include('parts.footer')
@endsection