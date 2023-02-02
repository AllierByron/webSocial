
function initMap() {
    //Opciones del mapa
    var options = {
        zoom:18,
        center:{lat: 20.7189905, lng: -103.386793268}
    }

    //Mapa
    var map = new google.maps.Map(document.getElementById('map'), options);

    //Funcion para agregar Marcadores
    function addMarker(props){
        var marker = new google.maps.Marker({
            position:props.coords,
            map:map,
            title:props.title
        });
    }
    //Marcadores
    addMarker({coords:{lat: 20.7189905, lng: -103.386793268},title:'Scribe HQ'});
    

  }
