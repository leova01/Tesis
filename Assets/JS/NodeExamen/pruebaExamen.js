// const axios = require("axios");
// const os = require("os");
// const si = require("systeminformation");

// const info = {};

// info.hostname = os.hostname();
// info.arch = os.arch();
// info.platform = os.platform();
// info.release = os.release();

// si.cpu().then((data) => {
//   info.cpu = {};
//   info.cpu.manufacturer = data.manufacturer;
//   info.cpu.brand = data.brand;
//   info.cpu.speed = data.speed;

//   si.mem().then((data) => {
//     info.mem = {};
//     info.mem.total = data.total;
//     info.mem.free = data.free;

//     si.graphics().then((data) => {
//       info.gpu = {};
//       info.gpu.vendor = data.controllers[0].vendor;
//       info.gpu.model = data.controllers[0].model;
//       info.gpu.vram = data.controllers[0].vram;

  
    


//       axios
//         .post("http://localhost:3000/informacion", info) //direccion de la peticion del servidor
//         .then((response) => {
//           console.log(response.data);
//         })
//         .catch((error) => {
//           console.log(error);
//         });


//     });
//   });
// });


const axios = require("axios");
const os = require("os");
const si = require("systeminformation");

const info = {};

info.hostname = os.hostname();
info.arch = os.arch();
info.platform = os.platform();
info.release = os.release();

si.cpu().then((data) => {
  info.cpu = {};
  info.cpu.manufacturer = data.manufacturer;
  info.cpu.brand = data.brand;
  info.cpu.speed = data.speed;

  si.memLayout((data) => {
    info.mem = {};
    info.mem.total = data.reduce((acc, curr) => acc + curr.size, 0);
    info.mem.free = si.mem().then((data) => data.free);
    info.mem.serialNums = data.map((mem) => mem.serialNum);

    si.graphics().then((data) => {
      info.gpu = {};
      info.gpu.vendor = data.controllers[0].vendor;
      info.gpu.model = data.controllers[0].model;
      info.gpu.vram = data.controllers[0].vram;

      axios
        .post("http://localhost:3000/informacion", info)
        .then((response) => {
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    });
  });
});

