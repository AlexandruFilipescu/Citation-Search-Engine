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
    var json_result = bibtexParse.entries(bibtex);
    
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

  async function returnMatches(arrayToPass)
  {
    var foundValues = 0;
    var totalValues = 0;

    const array = await jsonfile.readFile('./tests/testFile1.json');
    //lookedForWord = new RegExp('(Nierstrasz)|(Paolo)', 'g');
    //var regexArray = toRegex(['Paolo','Nierstrasz'], {contains: true});
    var regexArray = toRegex(arrayToPass, {contains: true});

    for(var object in array)
    {
        var value = array[object];
        for(var item2 in value)
        {
            totalValues++;
            var subValue = value[item2];
            subValue = String(subValue);
            if(subValue.match(regexArray))
            {
                //console.log(value);
                foundValues++;
                break;
            }

        }
    }  
    //console.log('Found Values =  ' + foundValues + ' Total values = ' + totalValues);
    return  foundValues;
}




  module.exports = {start, end,startParsing,returnMatches};