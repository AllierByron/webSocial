function displayData(data){
    document.getElementById('forums').innerHTML = "";
    data.forEach(data => {
        document.getElementById('forums').innerHTML += 
        `  
        <br><br>
        <div id="my-div" style="width: 100%; border-radius: 80px; height:100px; padding:0px 0px 0px 0px;">
            <a href="`+data.url+`" class="fill-div" style="color:white;">
                <h3 style="margin-left:40px;">`+data.nombre+`</h3>
                <p style="margin-left:40px;">${data.descripcion}, id: ${data.id}</p>
            </a>
        </div>`
        // console.log(`{{asset('/forum/2/`+data.id+`')}}`);
    });
}