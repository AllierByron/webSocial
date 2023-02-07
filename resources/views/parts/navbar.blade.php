<ul id="navegacion">
    <div>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('user') }}">Perfil</a>
        <a href="{{ route('expl') }}">Explorar</a>
        <a href="{{ route('subs') }}">Seguidos</a>
        <a href="{{ route('friends') }}">Amigos</a>
    </div>
    <div class="btnExtra" onclick="BarraExtra(this)">
        <div class="barraEsp"></div>
        <div id="linea1"></div>
        <div class="barraEsp"></div>
        <div id="linea2"></div>
        <div class="barraEsp"></div>
        <div id="linea3"></div>
    </div>
</ul>
<div id="opcExtra" class="dropdown-content">
    <a href="{{ route('conf') }}">Config</a>
    <a href="#">Opción 2</a>
    <a href="#">Opción 3</a>
</div>