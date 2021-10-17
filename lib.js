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

  module.exports = {start, end};