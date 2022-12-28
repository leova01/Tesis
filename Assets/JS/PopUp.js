
function PopUp(salon) {
    document.querySelector("#contenido").setAttribute("value",salon);

    document.getElementById("contenido2").innerHTML=salon;


    $("#informacion").html(`esta a punto de solicitar la informacion del salon ${salon}, de ser correcto presione aceptar de no ser asi cancele con el boton X `)
    $("#procesar").css({"display":"inline-block"});
    $("#ventana").fadeIn(500);


   
}


$('#procesar').click(regresar);

function regresar(){


    $.ajax({
    url:'./controlador/Mapeo.php',
    type:'POST',
    dataType:'json',
    data:{
        UbicacionPc:$('#contenido').val()
    }
    }).done(
        function(data){
            $('#informacion').append(data);
        }
    );


}

function ClosePopUp() {
    document.getElementById("contenido2").innerHTML=(" ");
    $("#informacion").html(` `);
    $("#procesar").css({"display":"none"});
    $("#ventana").fadeOut();
}
