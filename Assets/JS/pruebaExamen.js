


const axios = require("axios");
const si = require("systeminformation");
const { DateTime } = require('luxon');
const giga=(1024 * 1024 * 1024);
const mysql2 = require("mysql2");
const info = {};

// Obtener información del sistema operativo de manera asíncrona
si.osInfo().then((data) => {
  info.os = {}
  info.os.hostname = data.hostname;
  info.os.arch = data.arch;
  info.os.platform = data.platform;

      //obtener ip
      si.networkInterfaces().then(data =>{
        info.ip={}
        info.ip.ip4 = data[0].ip4
      });

  // Obtener información de la CPU de manera asíncrona
  si.cpu().then((data) => {
    info.cpu = {};
    info.cpu.manufacturer = data.manufacturer;
    info.cpu.brand = data.brand;
    info.cpu.speed = data.speed;

    // Obtener información de la memoria de manera asíncrona
    si.memLayout((data) => {
      info.mem = {};
      info.mem.total = data.reduce((acc, curr) => acc + curr.size, 0)/giga;
      info.mem.serialNums = data.map((mem) => mem.serialNum).join('-');

      // Obtener información de la tarjeta gráfica de manera asíncrona
      si.graphics().then((data) => {
        info.gpu = {};
        info.gpu.vendor = data.controllers[0].vendor;
        info.gpu.model = data.controllers[0].model;
        info.gpu.vram = data.controllers[0].vram;

        // Obtener información del disco de manera asíncrona
        si.diskLayout().then((data) =>{
          info.disk = {};
          info.disk.size = data[0].size/giga;
          info.disk.serialNum = data[0].serialNum;

          // Obtener la fecha y hora actual de manera síncrona
          info.tiempo={}
          const date = new Date();
          const year = date.getFullYear();
          const month = (date.getMonth() + 1).toString().padStart(2, '0');
          const day = date.getDate().toString().padStart(2, '0');
          const hour = date.getHours().toString().padStart(2, '0');
          const minute = date.getMinutes().toString().padStart(2, '0');
          const second = date.getSeconds().toString().padStart(2, '0');
          const millisecond = date.getMilliseconds().toString().padStart(6, '0');
          const formattedDatetime = `${year}-${month}-${day} ${hour}:${minute}:${second}.${millisecond}`;
          info.tiempo.fecha = formattedDatetime

      

           
  const connection = mysql2.createConnection({
    host: "localhost",
    user: "remoto",
    password: "remoto123",
    database: "dailylabcomp"
    });

    connection.connect((error)=>{
      if (error) {
        console.error("No se pudo conectar a la base de datos: " + error.message);
        }else{
          let sql = `INSERT INTO chequeo (
            nombreDispositivo, 
            arquitectura, 
            plataforma, 
            fechaPc, 
            fabricante_cpu,
            modelo_cpu,
            velocidad_cpu,
            memoria_total,
            memoria_serialNums,
            proveedor_gpu,
            modelo_gpu,
            vram_gpu,
            tamaño_disco,
            serialNum_disco,
            idPc
            )
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?, ( SELECT ID FROM equipos WHERE IP = ? )
              
              )`

            let values = [
              info.os.hostname,
              info.os.arch,
              info.os.platform,
              info.tiempo.fecha,
              info.cpu.manufacturer,
              info.cpu.brand ,
              info.cpu.speed,
              info.mem.total,
              info.mem.serialNums,
              info.gpu.vendor,
              info.gpu.model,
              info.gpu.vram,
              info.disk.size,
              info.disk.serialNum,
              info.ip.ip4
              ];//TE QUEDASTE AQUI HACIENDO LA CONSULTA DE LA IPPC

              connection.query(sql,values, (error,result)=>{
                if (error) {
                  console.error("No se pudo insertar los datos: " + error.message);
                  }else {
                    console.log(`Datos insertados con éxito de: ${info.os.hostname}`);
                    }
                    connection.end();
              });
        }
    })





          // Enviar la información a un servidor mediante una solicitud HTTP utilizando Axios de manera asíncrona
          axios
          .post("http://localhost:3000/informacion", info)
          .then((response) => {
            //console.log(response.data);
          })
          .catch((error) => {
            console.log(error);
          });
        });
      });
    });
  });
});























