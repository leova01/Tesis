function PopUp(salon) {
  document.querySelector("#contenido").setAttribute("value", salon);

  document.getElementById("contenido2").innerHTML = salon;

  $("#informacion").html(
    `esta a punto de solicitar la informacion del salon ${salon}, de ser correcto presione aceptar de no ser asi cancele con el boton X `
  );
  $("#procesar").css({ display: "inline-block" });
  $("#ventana").fadeIn(500);
}

function ClosePopUp() {
  document.getElementById("contenido2").innerHTML = " ";
  $("#informacion").html(` `);
  $("#procesar").css({ display: "none" });
  $("#ventana").fadeOut();
}


$("#procesar").click(regresar);







function regresar() {
  $.ajax({
    url: "./controlador/Mapeo.php",
    type: "POST",
    dataType: "json",
    data: {
      UbicacionPc: $("#contenido").val(),
    },
  }).done(function (data) {
    
console.log(data);






    $("#informacion").text('');
    
    $('<div>')
    .attr('id', 'myPcContainer')
    .html('')
    .appendTo('#informacion');

    data.forEach(PC => {
      function NetworkObject(ID, Nombre, Ubicacion, Estado, IP, MAC) {
        this.ID = ID;
        this.Nombre = Nombre;
        this.Ubicacion = Ubicacion;
        this.Estado = Estado;
        this.IP = IP;
        this.MAC = MAC;
      }

let dispositivo= new NetworkObject(PC.ID, PC.Nombre, PC.Ubicacion, PC.Estado, PC.IP, PC.MAC);
console.log(dispositivo.ID); //
console.log(dispositivo.Nombre); // 
console.log(dispositivo.Ubicacion); // 
console.log(dispositivo.Estado); // 
console.log(dispositivo.IP); // 
console.log(dispositivo.MAC); // 

   

});
  });

}
