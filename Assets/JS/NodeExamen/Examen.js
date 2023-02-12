const express = require("express");
const os = require("os");
const si = require("systeminformation");

const app = express();

app.get("/system-info", (req, res) => {
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

        res.send(info);
      });
    });
  });
});

const port = process.env.PORT || 3000;
app.listen(port, () => {
  console.log(`API is running on port ${port}`);
});
