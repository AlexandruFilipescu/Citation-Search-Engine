       var definitiveObjectArray;
       var objectArray;
       var list, textString, textArray;
       var searchForm = document.getElementById('searchForm');
       fetch('./output.json') //http://scg.unibe.ch/download/scgbib/json-conversion/scgbib.json
      .then(response => response.json())
      .then(data => {definitiveObjectArray = data; search();})

      let itemTemplateString = document.getElementById('item-template').innerHTML;
      let renderItem = Handlebars.compile(itemTemplateString);



      function filterIt(searchTags)
      {   
          return objectArray.filter(object => 
              searchTags.every(tag => Object.values(object)  // ACCOR02a","type": "techreport","AUTHOR": "Nierstrasz",
              .some(value=> value.includes(tag)) //"Nierstrasz"
              ));
      }


      function search()
      {
        beginSetup();
      }

      function getQueryString(){
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        return urlParams.get('query');
      }

      function beginSetup()
      {
        accordionItems= document.getElementById('accordionExample');
        textString =  getQueryString();  
        textArray = textString.split(' ');
        objectArray = definitiveObjectArray;
        objectArray = filterIt(textArray);
        
        let renderedItem = renderItem({items: objectArray});
        $('#accordionExample').append(renderedItem);
      }

           
      $(document).ready(function(){
        
        $('.accordion').on('click' ,function(event){
          console.log("Target: " + event.target);
          var target = $(event.target);
         
          if(target.is('a')){
            var href =  $(event.target).attr('href');
            window.open(href);
          }
        })
      });



      Handlebars.registerHelper('equals', (a,b) => a == b);

      Handlebars.registerHelper('joinToEnd', function(delim, ...args){
        args.pop();
        var args =  
        args.filter(arg => arg !== undefined)
        .join(delim);
        args += '. ';
        return args;
      });

      Handlebars.registerHelper('join', function(delim, ...args){
        args.pop();
        return args
        .filter(arg => arg !== undefined)
        .join(delim);
      })

      Handlebars.registerHelper('link', function(text, url){
        var url = Handlebars.escapeExpression(url),
            text = Handlebars.escapeExpression(text);
        
        return new Handlebars.SafeString("<a href='" + url + "'>" + text + "</a>");

      })