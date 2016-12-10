

<?php
include_once '../controller/trash3.php';
//include_once '../common_utilities/header.php';
include_once '../controller/view_groups.php';

?>
  
  <body>
<div class="container">
    <div class="row">
        
  

  
  
      
    <div class="table-responsive">
    <h2>GROUPS</h2>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>CREATED ON</th>
        <th>CLOSED ON</th>
        <th>CREATED BY</th>
        <th>LIST OF PROJECTS</th>
        
        <th>LIST OF MEMBERS</th>
        <th>role</th>
        <th>DELETE</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
       <th>ID</th>
        <th>NAME</th>
        <th>CREATED ON</th>
        <th>CLOSED ON</th>
        <th>CREATED BY</th>
        <th>LIST OF PROJECTS</th>
        
        <th>LIST OF MEMBERS</th>
        <th>role</th>
        <th>DELETE</th>
            </tr>
        </tfoot>
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
                          /*echo implode(',', $k);*/
                        }
                        else
                          echo $k;
                        

                    }
                    if($i==0)$n='owner';elseif($i==1)$n='modifier';elseif($i==2)$n='readonly';
                        echo '</td>';
                        print '<td>'.$n.'</td>';
           print '<td><button class="btn-danger data-toggle="modal" data-target="#myModal">DELETE</button></td>';
                      
                   }

                  }

                



?>


           
      
    </tbody>
  </table>
</div>


  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Small Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a small modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>











</div>


    
    
   
    <script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>


</html> 
        
   

      


        

        


        
          
        

        
       
        
       
        
        
       
          
        
          
        
       
        
        
        

            
         
        


        
        

        
       
       

      
          
       



       
      
      
     
     
        

        
          
        
        
      

       
          
        
        
     

       
          
       
       
    

        
          
       

      


        

      


       
          
        

        
        
        
       
        
        
        
          
        
          
        
       
        
        
        

            
         
        


          
        

        
        
       

        
          
    


       

        
      


      



        
        
     

        
          
        
        
    

        
          
        

      


        

        


        
          
        

        
        
        
       
        
        
        
          
        
          
        
       
        
      
        

            
          
        


        
        

        
       
       

      
          
       



       

      
      
      
     
