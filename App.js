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
        searchTags.every(tag => Object
        .values(object)
        .some(s=> s.includes(tag))
        ));

}

// const array = [-3, -2, -1, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];

// function isPrime(number)
// { 
//     return number >10;
// }

// console.log(array.filter(isPrime));



server.listen(port, hostname, () => 
{
    console.log(`Server running at http://${hostname}:${port}/`);

    //lib.startParsing('scg.bib');  //This is the .bib => JSON
    
    let lookedFor = ['Nierstrasz'];

    console.log(filterIt(lookedFor));

  
})
















