<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>Front End</title>
  </head>
  <body>

    <div class="container">

      <div class="row mt-4">

        <div class="col">
          <form action="" method="GET" class="d-flex" >
            <input id="searchForm"   type="text" name="query"
            placeholder="Search for keywords" class="form-control me-2" >

            <input  id="button" class="btn btn-outline-primary"
            type="submit" name="submit" value="Search">
            <!-- onclick="search()" -->
          </form>

        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="mt-5">

          <div class="accordion" id="accordionExample">

              <template id="item-template">
               {{#each items}}
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="{{key}}random">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#{{key}}" aria-expanded="true" aria-controls="{{key}}">


                        {{#if (equals type "article")}} {{joinToEnd ', ' AUTHOR TITLE JOURNAL (join '' VOLUME '(' NUMBER ')') (join '' MONTH ' ' YEAR) PAGES NOTE }} {{/if}}

                        {{#if (equals type "book")}} {{joinToEnd ', ' AUTHOR EDITOR TITLE (join '' SERIES  '(' VOLUME ')') PUBLISHER ADDRESS (join '' MONTH ' ' YEAR) NOTE }} {{/if}}

                        {{#if (equals type "booklet")}} {{joinToEnd ', ' AUTHOR TITLE ADDRESS NOTE  }} {{/if}}

                        {{#if (equals type "conference")}} {{joinToEnd ', ' AUTHOR TITLE BOOKTITLE EDITOR (join '' SERIES  '(' VOLUME ')') NUMBER PUBLISHER ADDRESS (join '' MONTH ' ' YEAR) NOTE }} {{/if}}

                        {{#if (equals type "inbook")}} {{joinToEnd ', ' AUTHOR EDITOR TITLE BOOKTITLE PAGES PUBLISHER (join '' SERIES  '(' VOLUME ')')  ADDRESS NOTE }} {{/if}}

                        {{#if (equals type "incollection")}} {{joinToEnd ', ' AUTHOR EDITOR TITLE BOOKTITLE (join '' SERIES  '(' VOLUME ')')  PAGES PUBLISHER ADDRESS (join '' MONTH ' ' YEAR) NOTE }} {{/if}}

                        {{#if (equals type "inproceedings")}} {{joinToEnd ', ' AUTHOR EDITOR TITLE BOOKTITLE (join '' SERIES  '(' VOLUME ')')  PAGES ORGANIZATION PUBLISHER ADDRESS (join '' MONTH ' ' YEAR) NOTE }} {{/if}}

                        {{#if (equals type "manual")}} {{joinToEnd ', ' BOOKTITLE AUTHOR ORGANIZATION PUBLISHER ADDRESS (join '' MONTH ' ' YEAR) NOTE  }} {{/if}}

                        {{#if (equals type "mastersthesis")}} {{joinToEnd ', '  AUTHOR TITLE TYPE SCHOOL ADDRESS (join '' MONTH ' ' YEAR) NOTE   }} {{/if}}

                        {{#if (equals type "misc")}} {{joinToEnd ', ' AUTHOR TITLE (join '' MONTH ' ' YEAR) NOTE }} {{/if}}

                        {{#if (equals type "phdthesis")}} {{joinToEnd ', '  AUTHOR TITLE TYPE SCHOOL ADDRESS (join '' MONTH ' ' YEAR) NOTE   }} {{/if}}

                        {{#if (equals type "proceedings")}} {{joinToEnd ', ' EDITOR TITLE (join '' SERIES  '(' VOLUME ')') PUBLISHER ADDRESS (join '' MONTH ' ' YEAR) NOTE  }} {{/if}}

                        {{#if (equals type "techreport")}} {{joinToEnd ', ' AUTHOR TITLE (join '' TYPE ' ' NUMBER) INSTITUTION  ADDRESS (join '' MONTH ' ' YEAR) NOTE  }} {{/if}}

                        {{#if (equals type "unpublished")}} {{joinToEnd ', ' AUTHOR TITLE (join '' MONTH ' ' YEAR) NOTE }} {{/if}}
                       
                      </button>
                    </h2>

                    <div id="{{key}}" class="accordion-collapse collapse" aria-labelledby="{{key}}random">
                      <div class="accordion-body">
                        
                       {{ABSTRACT}} 
                     
                      </div>
                    </div>

                  </div>
                {{/each}}
              </template>

            </div>


          </div>
        </div>
      </div>

    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js" integrity="sha512-RNLkV3d+aLtfcpEyFG8jRbnWHxUqVZozacROI4J2F1sTaDqo1dPQYs01OMi1t1w9Y2FdbSCDSQ2ZVdAC8bzgAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
       var definitiveObjectArray;
       var objectArray;
       var list, textString, textArray;
       var searchForm = document.getElementById('searchForm');
       fetch('./test.json')
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

      function isEmptyObject(object){
        var name;
        for(name in object){
          return false;
        }
        return true;
      }

      <?php
         if(isset($_GET['submit']))
         {
           $queryContent = $_GET['query'];
         } else {
          $queryContent = 'Pascal';
         }
      ?>


      function search()
      {
        beginSetup();
      }



      function beginSetup()
      {
        accordionItems= document.getElementById('accordionExample');
        //accordionItems.textContent = '';
        textString =  "<?php echo $queryContent; ?>";  
        //document.getElementById('searchForm').value;
        textArray = textString.split(' ');
        objectArray = definitiveObjectArray;
        objectArray = filterIt(textArray);
        
        let renderedItem = renderItem({items: objectArray});
        $('#accordionExample').append(renderedItem);
        

      }


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


     
    </script>
  </body>
</html>




