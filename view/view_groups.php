
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
        <th>role<th>
        
      
    </thead>
    <tbody>
        
      <?php

      if(!empty($list_owner_details))
      {

      foreach($list_owner_details as $d)
      {
          echo '  <tr>';

        
      


      


      ?>
    
        <td><?php echo $d[0];
        //print_r($k);

        ?>
          
        </td>
        <td><?php echo $d[1];
        //print_r($k);

        ?>
          
        </td>
        <td><?php echo $d[2];
        //print_r($k);

        ?>
          
        </td>
        <td><?php echo $d[3];
        //print_r($k);

        ?>
          
        </td>


        <td><?php echo $d[4];
        //print_r($k);

        ?>
          
        </td>


        <td><?php
           if($d[5])
        foreach($d[5] as $pro)
        
           echo $pro.',';
        ?>
          
        </td>
        <td>owner</td>



        <?php } ?>
      </tr>
      <?php 
      }
      
      ?>

<?php

      if(!empty($list_modifier_details))
      {

      foreach($list_modifier_details as $d)
      {
          echo '  <tr>';

        
      


      


      ?>
    
        <td><?php echo $d[0];
        //print_r($k);

        ?>
          
        </td>
        <td><?php echo $d[1];
        //print_r($k);

        ?>
          
        </td>
        <td><?php echo $d[2];
        //print_r($k);

        ?>
          
        </td>
        <td><?php echo $d[3];
        //print_r($k);

        ?>
          
        </td>


        <td><?php echo $d[4];
        //print_r($k);

        ?>
          
        </td>


        <td><?php

        foreach($d[5] as $pro)
        

            echo $pro.',';
        ?>
          
        </td>
        <td>modifier</td>



        <?php } ?>
      </tr>
      <?php 
      }
      
      ?>
      

      <?php

      if(!empty($list_readonly_details))
      {

      foreach($list_readonly_details as $d)
      {
          echo '  <tr>';

        
      


      


      ?>
    
        <td><?php echo $d[0];
        //print_r($k);

        ?>
          
        </td>
        <td><?php echo $d[1];
        //print_r($k);

        ?>
          
        </td>
        <td><?php echo $d[2];
        //print_r($k);

        ?>
          
        </td>
        <td><?php echo $d[3];
        //print_r($k);

        ?>
          
        </td>


        <td><?php echo $d[4];
        //print_r($k);

        ?>
          
        </td>


        <td><?php

        foreach($d[5] as $pro)
       
            echo $pro.',';
        ?>
          
        </td>

        <td>readonly</td>



        <?php } ?>
      </tr>
      <?php 
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

