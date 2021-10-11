

let d = new Date();
document.body.innerHTML = "<h2>Time right now is:  " + d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
"</h2>";



const server = http.createServer((req, res) => {
    // we can access HTTP headers
    req.on('data', (chunk) => {
      console.log(`Data chunk available: ${chunk}`)
    })
    req.on('end', () => {
      //end of data
    })
  })
  
console.log("Hello world!");