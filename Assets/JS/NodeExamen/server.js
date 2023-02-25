const express = require('express');
const bodyParser = require('body-parser');
const app = express();
const port = 3000;


// Middleware para parsear el cuerpo de la petición como JSON
app.use(bodyParser.json());

// Ruta para recibir la información del archivo JSON
app.post('/informacion', (req, res) => {
  const info = req.body;
  console.log(info);
  res.send('Información recibida.');
});

// Iniciar el servidor
app.listen(port, () => {
  console.log(`Servidor escuchando en http://localhost:${port}`);
});
