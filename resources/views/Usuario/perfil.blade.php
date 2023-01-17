<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset( 'css/style.css' ) }}">
</head>
<body>
    @include('navbar')
    <div id="muro"><img src="" alt=""></div>

    <div class="row">
        <div id="user" class="columnas"><!--izquierda-->
            <div id="foto"><img src="" alt=""></div>
            <h1 id="nombre">Perfil De Usuario</h1>
        </div>

        <div id="cont" class="columnas">   <!--centro-->
            <div id="filtros">
                <select name="likes" id="" class="likes">
                    <option value="0">Mas Likes</option>
                    <option value="1">Menos Likes</option>
                </select>
                <label for="likes" style="float: left;">Filtar por: </label>

            </div>
        </div>

        <div id="extra" class="columnas"><!--derecha-->
            <p id="t-extra">Contenido Destacado</p>
        </div>
    </div>
    

</body>
</html>