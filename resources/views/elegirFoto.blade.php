<div class="popup" id="popup-1">
    <div class="overlay"></div>
    <div class="content">
        <div class="close-btn" onclick="popupInS()">&times;</div>
        <div id="contenido-hid"></div>

        <div id="imgs">
            <img src="{{asset('img/shrek.png')}}" alt="shrek" id="img-generica-1" class="imgs-genericas" width="150px" height="150px">
            <input type="radio" name="img-elegida" id="img-elegida-1" value="shrek.png">
            <img src="{{asset('img/jerma.jpeg')}}" alt="" id="img-generica-2" class="imgs-genericas" width="150px" height="150px">
            <input type="radio" name="img-elegida" id="img-elegida-2" value="jerma.jpeg">
            <img src="{{asset('img/marksPizzapng.png')}}" alt="" id="img-generica-3" class="imgs-genericas" width="150px" height="150px">
            <input type="radio" name="img-elegida" id="img-elegida-3" value="marksPizzapng.png" alt="" id="img-generica-3">
            <img src="{{asset('img/genericMna.png')}}" alt="" id="img-generica-4" class="imgs-genericas" width="150px" height="150px">
            <input type="radio" name="img-elegida" id="img-elegida-4" value="genericMna.png">
            <img src="{{asset('img/genericWoman.png')}}" alt="" id="img-generica-5" class="imgs-genericas" width="150px" height="150px">
            <input type="radio" name="img-elegida" id="img-elegida-5" value="genericWoman.png">
        </div>
        <p>O bien, añade una imagen</p>
        <input type="file" accept="image/*" name="avatar" id="avatar-URL" size="30000">
        
    </div>
</div>