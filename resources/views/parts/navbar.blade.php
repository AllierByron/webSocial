<ul id="navegacion">
    <div>
        <a href="{{ route('home') }}">Home</a>
        @if(!Auth::check())
            <a href="{{ route('user') }}">Perfil</a>
        @else
            <a href="{{ asset('/usuarioPosts/3') }}">Perfil</a>
        @endif
        <a href="{{ route('expl',['id'=>1]) }}">Explorar</a>
        <a href="{{ route('subs') }}">Seguidos</a>
        <a href="{{ route('friends') }}">Amigos</a>
    </div>
    {{-- <button id="Inicio-sesion" ">Identificarse</button> --}}
    <p href="" id="Inicio-sesion" style="float: right;" onclick="popupInS();">Identificarse</p>
    
</ul>
@include('layouts.sesion')

