<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Foro</title>
    <link rel="stylesheet" href="{{asset('css/editPerfil.css')}}">
    <style>

    </style>
</head>
<body>
    <div id="btn-atras"> <p onclick="history.back();" style="cursor: pointer;" id="p-atras"> < Atras</p> </div>
    <div id="contenido">
        <h1>Crea tu foro</h1>
        <br>
        <form action="{{asset('/createForum')}}" method="POST">
            <div id="campos-editables">
                @csrf
                <label for="name">Nombre de la comunidad: </label>
                <input type="text" name="forumName" id="name" value="">
                <br><br>
                <label for="urlFB">Descripcion: </label>
                {{-- este input sigue teniendo el id "urlFB" debido al css --}}
                <input type="text" name="descripcion" id="urlFB" value="">
                <br>
                @if(session('msj1')) <strong style="color:green;">{{session('msj1')}}</strong>
                @elseif(session('msj2')) <strong style="color:red;">{{session('msj2')}}</strong>
                @endif
                <br><br>
                <button formmethod="POST">Crear</button>
            </div>
        </form>
    </div>

    <script src="{{asset('js/button.js')}}"></script>
</body>
</html>