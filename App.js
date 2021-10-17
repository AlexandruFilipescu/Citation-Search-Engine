const http = require('http');
const bibtexParse = require('bibtex-parse');
var jsonPath = require('jsonpath');
const jsonfile = require('jsonfile');
var outputJSON = require('./output.json');
const lib = require('./lib');
const hostname = '127.0.0.1';
const port = 3000;



function startParsing(fileName)
{
    const fs = require('fs');
    const bibtex = fs.readFileSync(fileName, 'utf8');
    var json_result = bibtexParse.entries(bibtex);
    
    var json_content = JSON.stringify(json_result);
    fs.writeFile("output.json", json_content, 'utf-8', function (err) {
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

server.listen(port, hostname, () => 
{
    console.log(`Server running at http://${hostname}:${port}/`);

    jsonfile.readFile('./output.json')
    .then(array => {
    var foundValues = 0;
    var totalValues = 0;
    lib.start();
    for(var object in array){
        var value = array[object];
        for(var item2 in value){
            totalValues++;
            var sub_value = value[item2];

            if(sub_value.toString().toLowerCase().includes('OsCaR'.toLowerCase()))
            {
                console.log(value);
                foundValues++;
            }
        }
    }  
    console.log('Found Values =  ' + foundValues + ' Total values = ' + totalValues);
    lib.end();
    });




    //var filtered = object.filter(object => object['AUTHOR'].includes('Paol'));
    //var results = jsonPath.query(object, '$.*[*~)]');  // THIS WAS FOR JSONPATH framework
    //"$[?(@.AUTHOR =~ /.*Paolo.*/i) ]"
    //startParsing('scg.bib');  This is the .bib => JSON
})

















