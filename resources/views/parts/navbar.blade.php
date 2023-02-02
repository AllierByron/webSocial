<ul id="navegacion">
    <div>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('user') }}">Perfil</a>
        <a href="{{ route('expl') }}">Explorar</a>
        <a href="{{ route('subs') }}">Seguidos</a>
        <a href="{{ route('friends') }}">Amigos</a>
    </div>
    {{-- <button id="Inicio-sesion" ">Identificarse</button> --}}
    <p href="" id="Inicio-sesion" style="float: right;" onclick="popupInS();">Identificarse</p>
</ul>
@include('layouts.sesion')

