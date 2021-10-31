const http = require('http');
const bibtexParse = require('bibtex-parse');
const hostname = '127.0.0.1';
const port = 3000;

var startTime, endTime;

function start() {
  startTime = new Date();
};

function end() {
  endTime = new Date();
  var timeDiff = endTime - startTime; //in ms
  // strip the ms


  // get seconds 
  var seconds = Math.round(timeDiff);
  console.log(seconds + " milliseconds");
}

function startParsing(fileName)
{
    const fs = require('fs');
    const bibtex = fs.readFileSync(fileName, 'utf8');
    var json_result = bibtexParse.entries(bibtex);
    
    var json_content = JSON.stringify(json_result);
    fs.writeFile("BrokenTests.json", json_content, 'utf-8', function (err) {
        if (err) {
            console.log("An error occured while writing JSON Object to File.");
            return console.log(err);
        }
     
        console.log("JSON file has been saved.");
    });
}


const server = http.createServer((req, res) =>{
    res.statusCode = 200;
    res.setHeader('Content-Type', 'text/plain');
    res.end('Hello World');
    
    
})

server.listen(port, hostname, () => {
    console.log(`Server running at http://${hostname}:${port}/`);
    //start();
    startParsing('./BrokenFileTests/ScgMissingBrakets.bib');
    //end();
})
