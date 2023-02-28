{{-- crear una vista para editar la informacion de cuenta. Esta tiene que ser semejante a la configuracion de reddit (referencia) --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/editPerfil.css')}}">
</head>
<body>
    <div id="btn-atras"> <p onclick="history.back();" style="cursor: pointer;" id="p-atras"> < Atras</p> </div>
    <div id="contenido">
        <h1>Editar Perfil</h1>
        <br>
        <form action="{{asset('/update/1')}}" method="POST">
            <div id="campos-editables">
                @csrf
                <label for="name">Nombre del perfil: </label>
                <input type="text" name="name" id="name" value="{{auth()->user()->name}}">
                <br><br>
                <label for="urlFB">URL de perfil de facebook: </label>
                <input type="text" name="urlFB" id="urlFB" value="{{auth()->user()->facebook}}">
                <p id="text-profileURL">
                    La URL del perfil es autogenerada hacia una busqueda de usuario en facebook, no redirecciona <br>
                    a la URL actual del perfil. Si aun no has actualizado la URL se recomienda que lo hagas, de esta <br>
                    manera el enlace funcionara de la manera correcta.
                </p>
                <br>
                <img id="img-editProfile" src="{{auth()->user()->foto_perfil}}" alt=""  width="150px" height="150px" class="imgs-genericas">
                <br>
                <p onclick="popupInS();" style="cursor: pointer;" id="edit-pp">Editar foto de perfil</p>
                @include('elegirFoto')
                <br><br>
                <button formmethod="POST">Guardar</button>
            </div>
        </form>
    </div>

    <script src="{{asset('js/button.js')}}"></script>
</body>
</html>



