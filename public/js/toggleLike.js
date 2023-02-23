function like(className) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            try {
                var datos = this.responseText;
                console.log(datos);
            } catch (error) {
                console.log(error);
            }
        }
    };
    className = className.split(" ")
    var url = className[2];
    
    xmlhttp.open("GET", url, true);
    xmlhttp.send(); 
}

function prueba(className){
    className = className.split(" ")
    alert(className[2]);
}