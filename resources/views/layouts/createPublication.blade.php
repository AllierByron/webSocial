<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Publicacion</title>
    <link rel="stylesheet" href="{{asset('css/editPerfil.css')}}">
    <style>

    </style>
</head>
<body>
    <div id="btn-atras"> <p onclick="history.back();" style="cursor: pointer;" id="p-atras"> < Atras</p> </div>
    <div id="contenido">
        <h1>Publica</h1>
        <br>
        <form action="{{asset('/createForum')}}" method="POST">
            <div id="campos-editables">
                @csrf
                <label for="name">Titulo: </label>
                <input type="text" name="forumName" id="name" value="" required>
                <br><br>
                <label for="urlFB">Descripcion: </label>
                {{-- este input sigue teniendo el id "urlFB" debido al css --}}
                <input type="text" name="descripcion" id="urlFB" value="" required>
                <br><br>
                <label for="content">URL(img, videos, gifs) </label>
                <input type="text" id="content" name="content" value="">
                <br><br>
                <button formmethod="POST">Publicar</button>
            </div>
        </form>
    </div>

    <script src="{{asset('js/button.js')}}"></script>
</body>
</html>