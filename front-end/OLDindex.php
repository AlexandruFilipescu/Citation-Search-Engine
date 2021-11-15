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
            <ol class="list-group list-group-numbered" id="list"></ol>
          </div>
        </div>
      </div>

    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
       var definitiveObjectArray;
       var objectArray;
       var list, textString, textArray;
       var searchForm = document.getElementById('searchForm');
       fetch('./output.json')
      .then(response => response.json())
      .then(data => {definitiveObjectArray = data; search();})


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
         }
      ?>

      function beginSetup(){
  
        list= document.getElementById('list');
        list.textContent = '';
        textString =  "<?php echo $queryContent; ?>";  //document.getElementById('searchForm').value;
        textArray = textString.split(' ');
        objectArray = definitiveObjectArray;
        
        objectArray = filterIt(textArray);
      }

      function search(){

        beginSetup();
          objectArray.forEach( (item, index) =>{
            
            var url, title,bookTitle,month,address,publisher,series,pages,year,doi, authorArray,pdf,url;

// HIDDEN IF clauses
{
  
            if(typeof item.AUTHOR  != 'undefined')
            {
              authorArray = item.AUTHOR;
              authorArray = item.AUTHOR.split(' and');
              authorArray = authorArray.join(',');
            } else {
              authorArray = '';
            }
            
            if(typeof item.URL === 'undefined' )
            {
              url = item.TITLE;
            } else {
              url = '<a href="'+item.URL+'"> ' + item.TITLE + '</a>';
            }

            if(typeof item.TITLE  != 'undefined')
            {
              title = ' <b>Title: </b>'          + item.TITLE;
            } else {
              title = '';
            }

            if(typeof item.BOOKTITLE  != 'undefined')
            {
              bookTitle = ' <b>In </b>'          + item.BOOKTITLE;
            } else {
              bookTitle = '';
            }

            if(typeof item.MONTH  != 'undefined')
            {
              month = ', ' + item.MONTH;
            } else {
              month = '';
            }

            if(typeof item.ADDRESS  != 'undefined')
            {
              address = ', ' + item.ADDRESS;
            } else {
              address = '';
            }

            if(typeof item.PUBLISHER  != 'undefined')
            {
              publisher = ', ' + item.PUBLISHER;
            } else {
              publisher = '';
            }

            if(typeof item.SERIES  != 'undefined')
            {
              series = ', ' + item.SERIES;
            } else {
              series = '';
            }

            if(typeof item.PAGES  != 'undefined')
            {
              pages = ', ' + item.PAGES;
            } else {
              pages = '';
            }

            if(typeof item.YEAR  != 'undefined')
            {
              year = ', ' + item.YEAR;
            } else {
              year = '';
            }

            if(typeof (item['BDSK-URL-1'])  != 'undefined')
            {
              doi = ' <a href="'+item['BDSK-URL-1']+'"> '+ 'DOI' + '</a>';
            } else {
              doi = '';
            }

            if(typeof (item['BDSK-URL-2'])  != 'undefined')
            {
              pdf = ' <a href="'+item['BDSK-URL-2']+'"> '+ 'PDF' + '</a>';
            } else {
              pdf = '';
            }

            if(typeof (item.URL)  != 'undefined')
            {
              url = ' <a href="'+item.URL+'"> '+ 'URL' + '</a>';
            } else {
              url = '';
            }
}



          var li = document.createElement('li');
          li.className = 'list-group-item';
          li.innerHTML = '<b>Author:</b> ' + authorArray +
                                             url + 
           ', '                            + title + 
           ', '                            + bookTitle+ 
                                             series + 
                                             pages + 
                                             publisher  +
                                             address + 
                                             month + 
                                             year +
                                             doi +
                                             pdf + 
                                             url

           ;
  
          list.appendChild(li);
          
        });


      
      }





     
    </script>
  </body>
</html>

<?php
 function pre_r($array){
     echo '<pre>';
     print_r($array);
     echo '</pre>';
 }
?>


