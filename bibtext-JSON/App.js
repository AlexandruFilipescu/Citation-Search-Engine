const http = require('http');
const lib = require('./lib');
const fs = require('fs');
const jsonfile = require('jsonfile');
const hostname = '127.0.0.1';
const port = 3000;
const arrayOfObjects = require('./output.json');

const server = http.createServer((req, res) =>{
    res.statusCode = 200;
    res.setHeader('Content-Type', 'text/plain');
    res.end('Hello World');
    
});



function filterIt(searchTags)
{   
    
    return arrayOfObjects.filter(object => 
        searchTags.every(tag => Object.values(object)  // ACCOR02a","type": "techreport","AUTHOR": "Nierstrasz",
        .some(value=> value.includes(tag)) //"Nierstrasz"
        ));

}

function sum(a,b){
    return a+b;
}

let sum2 = (a,b) =>  a+b;



server.listen(port, hostname, () => 
{
    console.log(`Server running at http://${hostname}:${port}/`);

    //lib.startParsing('scg.bib');  //This is the .bib => JSON
    
    let lookedFor = ['ACM','1994','safa'];

    console.log(filterIt(lookedFor));

  
})
















