class slide{
  constructor(elemento){
    this.slideIndex = 0;
    this.elemento = elemento;
  }

  // Next/previous controls
  plusSlides(className,n) {
    console.log(className);
    this.showSlides(className, this.slideIndex += n);
  }

  showSlides(className, n) {
    let i;
    // console.log(className);
    let clase = className.split(" ");
    // console.log(clase[1]);
    console.log("id:"+clase[1]+", n: "+n+". sldIndx: "+this.slideIndex);
    let slides = document.getElementsByClassName("mySlides"+clase[1]);
    console.log(slides.length);
    // console.log(slides);

    if (n > slides.length) {this.slideIndex = 1}
    if (n < 1) {this.slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }

    slides[this.slideIndex-1].style.display = "block";
    console.log("id:"+clase[1]+", n: "+n+". sldIndx: "+this.slideIndex);

  }
}

var diapositivas = new Array();
var elemenPrevios = document.getElementsByClassName('prev');
var elemenSiguentes = document.getElementsByClassName('next');

for (let i = 0; i < elemenPrevios.length; i++) {
  console.log(i);
  const elementP = elemenPrevios[i];
  const elementS = elemenSiguentes[i];
  diapositivas.push(new slide(elementP));
  diapositivas.push(new slide(elementS));
}

console.log("dl: "+diapositivas.length);
for (let i = 0; i < diapositivas.length; i++) {
  // console.log(diapositivas[i]);
}

function llamar(className, n){
  console.log("clsname: "+className);
  let elemActual = document.getElementsByClassName(className);
  // console.log(elemActual[0]);
  for (let i = 0; i < diapositivas.length; i++) {
    // console.log(diapositivas[i].elemento);
    if(diapositivas[i].elemento == elemActual[0]){
      diapositivas[i].plusSlides(diapositivas[i].elemento.classList.value, n);
    }
  }
}

for (let i = 0; i < elemenPrevios.length; i++) {
  const elementP = elemenPrevios[i];
  const elementS = elemenSiguentes[i];
  elementS.click();

}

// Next/previous controls
// function plusSlides(className,n) {
//   showSlides(className,slideIndex += n);
// }

// function showSlides(className, n) {
//   let i;
  
//   var clase = className.split(" ");
//   // console.log(clase[1]);
//   console.log("id:"+clase[1]+", n: "+n);
//   let slides = document.getElementsByClassName("mySlides"+clase[1]);

//   // console.log(slides);

//   if (n > slides.length) {slideIndex = 1}
//   if (n < 1) {slideIndex = slides.length}
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }

//   slides[slideIndex-1].style.display = "block";
// }


