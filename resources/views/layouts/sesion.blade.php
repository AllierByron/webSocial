<form id="enviar" onsubmit="return camposVacios();" action="{{asset('/crUsuario/1')}}" method="POST">
    @csrf
    <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="popupInS()">&times;</div>
            <div id="contenido-hid"></div>
            
            <h1 id="titulo-InS">Cuenta</h1>
            <div id="InS">
                <div id="apartado-InS-1">
                    @if(!Auth::check())
                        <label for="correo-InS">Correo: </label>
                        <input type="text" name="correo-InS" id="correo-InS">
                        <br><br>
                        <label for="password-InS">Contraseña: </label>
                        <input type="password" name="password-InS" id="password-InS">
                        <br><br>
                        <button onclick="methodic('GET'); camposVacios();">Crear Cuenta</button>
                        <button formaction="{{asset('/isUsuario/1')}}" onclick="methodic('POST'); ">Iniciar sesion</button>
                        <br><br>
                        <a href="{{url('/auth/google/redirect')}}" style="a#InSG:hover{color:blue;}" class="InSRS">Inciar con google</a>
                        <br><br>
                        @if(session('error'))<strong id="apartado-InS" style="color: red;"> {{session('error')}}</strong>@endif
                    @endif
                    @if(Auth::check())
                        <p>Sesion iniciada como: {{auth()->user()->name}}</p>
                        <button formaction="{{asset('/outUsuario')}}" onclick="methodic('POST');">Cerrar Sesion</button>
                    @endif
                    <br><br>
                    @if(Auth::check())
                        @if(auth()->user()->facebook == null)
                            <a href="{{url('/auth/facebook/redirect')}}" style="text-decoration: underline;" class="InSRS">Conectar Facebook</a>
                        @else
                            <p>Facebook conectado</p>
                        @endif
                    @endif
                    <br><br>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/button.js')}}"></script>
    <script>
        function methodic(met = nada){
            try{
                console.log("met: "+met);
                if(met === 'GET'){
                    document.getElementById("enviar").setAttribute("method", "GET");
                }else if(met === 'POST'){
                    document.getElementById("enviar").setAttribute("method", "POST");
                }else{
                    console.log("nada");
                }
            }catch(e){
                console.log("error:"+e);
            }
        }

        function camposVacios(){
            var corr = document.getElementById('correo-InS').value;
            var pss = document.getElementById('password-InS').value;
            if(corr == "" || pss == "")
            { 
                alert("validation failed false");
                return false;
            }
        }
    </script>
</form>
