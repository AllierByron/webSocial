<div class="slideshow-container">
    
    @for ($i = 0; $i < count($d->contenido); $i++)
        <div class="mySlides{{$d->id}} fade" >
            <div class="numbertext">{{$i+1}} / {{count($d->contenido)}}</div>
            <img src="{{asset('img/posts/'.$d->contenido[$i])}}" {{--style="width:100%"--}} width="70%" height="70%">
            {{-- <div class="text">Caption Text</div> --}}
        </div>
    @endfor
        
    <!-- Next and previous buttons -->
    <a class="prev {{$d->id}}" onclick="/*plusSlides(this.className,-1);*/ llamar(this.className,-1);" onload="activar(this.className);">&#10094;</a>
    <a class="next {{$d->id}}" onclick="/*plusSlides(this.className,1)*/ llamar(this.className,1);" onload="activar(this.className);">&#10095;</a>
</div>
<br>

