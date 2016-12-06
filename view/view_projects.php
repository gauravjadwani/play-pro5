
<?php
include_once '../common_utilities/header.php';
include_once '../controller/list_user_projects.php';



?>
  <html>
  <head>

  <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
  </head>
  <body>
<div class="container">
    <div class="row">
        
  
  <h2>VIEW YOUR PROJECTS</h2>
  
  <div class="table-responsive">
  <table class="table" id='example'>
      
    <thead>
        <th>ID</th>
        <th>NAME</th>
        <th>CREATED ON</th>
        <th>DESC</th>
        <th>DEADLINE</th>
        <th>ASSOCIATED_GROUP</th>
        <th>LIST OF TASKS</th>
        <th>CLOSED ON</th>
        <th>CREATED BY</th>
    

    </thead>

    <tfoot>
            <tr>
               <th>ID</th>
        <th>NAME</th>
        <th>CREATED ON</th>
        <th>DESC</th>
        <th>DEADLINE</th>
        <th>ASSOCIATED_GROUP</th>
        <th>LIST OF TASKS</th>
        <th>CLOSED ON</th>
        <th>CREATED BY</th>
            </tr>
        </tfoot>

          <?php

              $arr=array($list_project_modifier_details,$list_project_owner_details,$list_project_readonly_details);


              for ($i=0; $i <sizeof($arr) ; $i++) 
              { 
                
                if($arr[$i])
               foreach($arr[$i] as $key)
               {

                echo '<tr>';
                foreach($key as $data)
                {
                  echo '<td>';
                  if(is_array($data))
                  {
                      foreach($data as $d)
                      echo $d.',';
                  }
                  else
                  {
                      echo $data;
                  }
                  
                  
                  echo '</td>';


                }
                echo '</tr>';
               }


              }


          ?>


    

    
    
    </div>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
  <script>
       <script>
       $(function(){
    $("#example").dataTable();
  })
  </script>
</body>


</html>

