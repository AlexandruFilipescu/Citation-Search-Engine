
const bibtexParse = require('bibtex-parse');
var jsonPath = require('jsonpath');
const jsonfile = require('jsonfile');
var outputJSON = require('./output.json');
var toRegex = require('to-regex');


/* istanbul ignore next */
function start() 
{
    startTime = new Date();
  };
  
/* istanbul ignore next */
function end() 
{
    endTime = new Date();
    var timeDiff = endTime - startTime; //in ms
    // strip the ms
  
  
    // get seconds 
    var seconds = Math.round(timeDiff);
    console.log(seconds + " milliseconds");
}

/* istanbul ignore next */
function startParsing(fileName)
{
    const fs = require('fs');
    const bibtex = fs.readFileSync(fileName, 'utf8');
    var json_result = bibtexParse.entries(bibtex, {number:"string"});
    
    var json_content = JSON.stringify(json_result);
    fs.writeFile("./output.json", json_content, 'utf-8', function (err) {
        if (err) {
            console.log("An error occured while writing JSON Object to File.");
            return console.log(err);
        } else {
          console.log("JSON file has been saved.");
        }
    });
}



  module.exports = {start, end,startParsing};