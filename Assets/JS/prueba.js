const { Client } = require('ssh2');
const { spawn } = require('child_process');

const conn = new Client();

conn.on('ready', () => {
  console.log('Conexión SSH establecida');

  conn.exec('comando de CMD aquí', (err, stream) => {
    if (err) throw err;
    stream.on('close', (code, signal) => {
      console.log(`CMD finalizado con código de salida ${code}`);
      conn.end();
    }).on('data', (data) => {
      console.log(`Salida del comando: ${data}`);
    }).stderr.on('data', (data) => {
      console.error(`Error de comando: ${data}`);
    });
  });
}).connect({
  host: '10.10.81.103',
  port: '22',
  username: 'leonel',
  password: '0101'
});
