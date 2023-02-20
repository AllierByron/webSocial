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

@section('scriptsv2')
    <script src="{{asset('js/filter.js')}}"></script>
    <script>

        //AJAX, manejo y distribuyo los datos con JS no con el controlador de PHP

        function filtrar1(){
            console.log(document.getElementById('filterBy').value);
            function filtrar(opc) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        try{
                            var datos = JSON.parse(this.responseText);
                            console.log(datos);
                            displayData(datos);
                        }catch(error){
                            var datos = [];
                            displayData(datos);
                            console.log(error);
                        }
                        console.log(typeof(datos)); 
                        console.log(datos);
                    }
                };
                var url = "";
                if(opc == 2){
                    url = "{{route('expl',['id'=>2])}}";
                }else if(opc == 3){
                    url = "{{route('expl',['id'=>3])}}";
                }
                console.log(opc);
                xmlhttp.open("GET", url, true);
                xmlhttp.send(); 
            }
            var opc = document.getElementById('filterBy').value;
            filtrar(opc);
        }    

        document.querySelector('#filterBy').addEventListener('change',function(){
            filtrar1();
        });
        document.addEventListener('DOMContentLoaded',filtrar1());
    </script>
@endsection

@section('content')

    <br>
    <div class="sec-inicial">
        <h1 class="titulos">Siguiendo:</h1>
    </div>

    
    <div id="1era-columna" class="row">
        <div class="columnas"></div>
        <div class="columnas" id="cont">
            <select name="" id="filterBy" name="filterBy">
                <option value="2">Comunidades creadas</option>
                <option value="3">Comunidades suscritas</option>
            </select>
            <div id="forums">
        </div>
        <div class="columnas"></div>
    </div>
    
</div>
    
@endsection

@section('footer')
    @include('parts.footer')
@endsection