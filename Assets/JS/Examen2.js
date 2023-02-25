const os = require("os");
const si = require("systeminformation");
const fs = require("fs");

const info = {};

info.nombreDispositivo = os.hostname();
info.sistema = {};
info.sistema.arquitectura = os.arch();
info.sistema.plataforma = os.platform();
info.sistema.versionSO = os.release();
info.dominio = os.hostname().split('.')[1];
const date = new Date();
info.fecha = date.toLocaleDateString();
info.hora = date.toLocaleTimeString();

si.cpu().then(data => {
  info.cpu = {};
  info.cpu.fabricante = data.manufacturer;
  info.cpu.modelo = data.brand;
  info.cpu.velocidad = data.speed;
  
  si.mem().then(data => {
    info.memoria = {};
    info.memoria.total = data.total;
    info.memoria.libre = data.free;
  
    si.graphics().then(data => {
      info.tarjetaGrafica = {};
      info.tarjetaGrafica.fabricante = data.controllers[0].vendor;
      info.tarjetaGrafica.modelo = data.controllers[0].model;
      info.tarjetaGrafica.memoria = data.controllers[0].vram;
      
      //Convertimos el objeto a un json
      const jsonData = JSON.stringify(info);
      const filename = `informacionPC-${os.hostname}.json`;
      if (fs.existsSync(filename)) {
        // Si el archivo ya existe, lo sobreescribimos
        fs.writeFileSync(filename, jsonData, {flag: 'w'});
        console.log(`El archivo ${filename} ha sido sobrescrito`);
      } else {
        // Si el archivo no existe, lo creamos
        fs.writeFileSync(filename, jsonData);
        console.log(`El archivo ${filename} ha sido creado`);
      }
    });
  });
});


const mysql = require('mysql2');

// Conectarse a la base de datos MySQL
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'dailylabcomp'
});

const jsonData = JSON.parse(fs.readFileSync(`informacionPC-${os.hostname}.json`, 'utf-8'));

// Preparar los datos para la consulta SQL
const nombreDispositivo = jsonData.nombreDispositivo;
const arquitectura = jsonData.sistema.arquitectura;
const plataforma = jsonData.sistema.plataforma;
const versionSO = jsonData.sistema.versionSO;
const fecha = jsonData.fecha;
const hora = jsonData.hora;
const fabricanteCPU = jsonData.cpu.fabricante;
const modeloCPU = jsonData.cpu.modelo;
const velocidadCPU = jsonData.cpu.velocidad;
const memoriaTotal = jsonData.memoria.total;
const memoriaLibre = jsonData.memoria.libre;
const fabricanteTarjetaGrafica = jsonData.tarjetaGrafica.fabricante;
const modeloTarjetaGrafica = jsonData.tarjetaGrafica.modelo;
const memoriaTarjetaGrafica = jsonData.tarjetaGrafica.memoria;

// Insertar los datos en la tabla
const sql = `INSERT INTO chequeos2 (nombreDispositivo, arquitectura, plataforma, versionSO, fechaPC, horaPC, fabricanteCPU, modeloCPU, velocidadCPU, memoriaTotal, memoriaLibre, fabricanteTarjetaGrafica, modeloTarjetaGrafica, memoriaTarjetaGrafica, fechaRegistro)
VALUES ('${nombreDispositivo}', '${arquitectura}', '${plataforma}', '${versionSO}', '${fecha}', '${hora}', '${fabricanteCPU}', '${modeloCPU}', '${velocidadCPU}', '${memoriaTotal}', '${memoriaLibre}', '${fabricanteTarjetaGrafica}', '${modeloTarjetaGrafica}', '${memoriaTarjetaGrafica}',CURDATE() )`;
connection.query(sql, (error, results) => {
  if (error) throw error;
  console.log('Data inserted successfully');
});

// Cerrar la conexión a la base de datos
connection.end();
