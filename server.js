

let d = new Date();
document.body.innerHTML = "<h2>Time right now is:  " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
"</h2>";

const data = firebase.database();
//Obtener una referencia a la raíz de la base de datos
let refToData = data.ref()
//Obtener una console.log de todos los datos 
dataRef.once('value', snapshot => {
  console.log(snapshot.val());
});


console.log("Hello world!");