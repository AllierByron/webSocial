function like(className) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            try {
                var datos = JSON.parse(this.responseText);
                console.log(datos);
                var keyword = (datos[0].url).split("/");
                var clase = className.split(" ");

                console.log("keyword0: "+keyword[3]);

                if(keyword[3] == "crComment"){
                    document.getElementsByClassName(clase[3])[0].classList = "fa fa-heart "+datos[0].url+" "+datos[0].publication_id;
                }else if(keyword[3] == "upComment"){
                    document.getElementsByClassName(clase[3])[0].classList = "fa fa-heart "+datos[0].url+" "+datos[0].publication_id+" updateComm";
                }

            } catch (error) {
                console.log(error);
            }
        }
    };
    var enlace = className.split(" ")
    var url = enlace[2];
    
    xmlhttp.open("GET", url, true);
    xmlhttp.send(); 
}

window.onload = function activate(){
    console.log("pues si sirvo");
    var elements = document.getElementsByClassName('fa fa-heart');
    
    for (let i = 0; i < elements.length; i++) {
        const element = elements[i];
        var keyword = element.classList[2].split("/");
        console.log(keyword[3]);
        if(keyword[3] == "upComment"){
            element.classList.add('updateComm');
        }
    }

    // var clase = className.split(" ");
    // var keyword = clase[3].split("/");
    // console.log(keyword[3]);
    // /*if(keyword[3] == "crComment"){
    //     document.getElementsByClassName(clase[3])[0].classList.remove();
    // }else */if(keyword[3] == "upComment"){
    //     document.getElementsByClassName(clase[3])[0].classList.add("updateComm");
    // }
}