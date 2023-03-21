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
        <form action="{{asset('/createPublication')}}" method="POST" enctype="multipart/form-data">
            <div id="campos-editables">
                @csrf
                <input type="hidden" name="forumID" id="forumID" value="{{session('forum')->id}}">
                <label for="name">Titulo: </label>
                <input type="text" name="postName" id="name" value="" required>
                <br><br>
                <label for="urlFB">Descripcion: </label>
                {{-- este input sigue teniendo el id "urlFB" debido al css --}}
                <input type="text" name="postDesc" id="urlFB" value="">
                <br><br>
                <label for="content">URL(img, videos, gifs) </label>
                <input type="file" id="content" name="content[]" value="" multiple>
                <br><br>
                <button formmethod="POST">Publicar</button>
            </div>
        </form>
    </div>

    <script src="{{asset('js/button.js')}}"></script>
</body>
</html>