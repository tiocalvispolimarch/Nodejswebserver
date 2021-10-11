const express = require('express');
const { join } = require('path');
const path = require('path');

const app = express();



app.get('/',(req, res)=>  {
res.sendFile(path.join(__dirname)+'/Views/index.html');
});

const PORT = process.env.PORT || 8080;
app.listen(PORT, _ =>{

    console.log( `Aplicacion desarrollada en el puerto ${PORT}` );
});

let d = new Date();
document.body.innerHTML = "<h1>Time right now is:  " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds()</h1>

