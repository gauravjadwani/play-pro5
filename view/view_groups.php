
<?php
include_once '../common_utilities/header.php';
include_once '../controller/view_groups.php';

?>
  <html>
  <head>

  <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
  </head>
  <body>
<div class="container">
    <div class="row">
        
  
  <h2>VIEW YOUR GROUPS </h2>
  
  <div class="table-responsive">
  <table class="table" id='example'>
      
    <thead>
        <th>ID</th>
        <th>NAME</th>
        <th>CREATED ON</th>
        <th>CLOSED ON</th>
        <th>CREATED BY</th>
        <th>LIST OF PROJECTS</th>
        
        <th>LIST OF MEMBERS</th>
        <th>role</th>
        
      
    </thead>
    <tbody>
        
      <?php
$arr=array($list_owner_details,$list_modifier_details,$list_readonly_details);


              for ($i=0; $i <sizeof($arr) ; $i++) 
              { 
                
              
               foreach($arr[$i] as $key)
               {
                    echo '<tr>';
                    foreach($key as $k)
                    {
                        echo '<td>';
                      if(is_array($k))
                        {
                          foreach($k as $k1)
                          echo $k1.',';
                        }
                        else
                          echo $k;
                        

                    }
                    if($i==0)$n='owner';elseif($i==1)$n='modifier';elseif($i==2)$n='readonly';
                        echo '</td>';
                        print '<td>'.$n.'</td>';
                      
                   }

                  }

                



?>

    </tbody>
  </table>
  </div>
</div>


    
    
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

