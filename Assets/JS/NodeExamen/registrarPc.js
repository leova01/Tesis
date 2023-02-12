const os = require("os");
const fs = require("fs");
const mysql2 = require("mysql2");

const info = {};
info.nombreDispositivo = os.hostname();

let interfaces = os.networkInterfaces();
info.direccionesIP = [];
info.direccionMAC = '';
for (let k in interfaces) {
for (let k2 in interfaces[k]) {
let address = interfaces[k][k2];
if (address.family === 'IPv4' && !address.internal) {
info.direccionesIP.push(address.address);
info.direccionMAC = address.mac;
}
}
}

const connection = mysql2.createConnection({
host: "localhost",
user: "root",
password: "",
database: "dailylabcomp"
});

connection.connect((error) => {
if (error) {
console.error("No se pudo conectar a la base de datos: " + error.message);
} else {
let sql = `INSERT INTO equipos (Nombre,Ubicacion,Estado, IP, MAC) VALUES (?,?,?,?,?)`
let values = [info.nombreDispositivo, "k01", "A", info.direccionesIP[0], info.direccionMAC];
connection.query(sql, values, (error, result) => {
if (error) {
console.error("No se pudo insertar los datos: " + error.message);
} else {
console.log("Datos insertados con éxito.");
}
connection.end();
});
}
});
