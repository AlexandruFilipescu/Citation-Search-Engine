const http = require('http');
const lib = require('./lib');

const hostname = '127.0.0.1';
const port = 3000;





const server = http.createServer((req, res) =>{
    res.statusCode = 200;
    res.setHeader('Content-Type', 'text/plain');
    res.end('Hello World');
    
});



server.listen(port, hostname, () => 
{
    console.log(`Server running at http://${hostname}:${port}/`);

    //lib.returnMatches(['Scglib']).then((value) => console.log("Total found values = " + value));
    
    lib.startParsing('scg.bib');  //This is the .bib => JSON
})















