

<?php
include_once '../common_utilities/header.php';
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
                      echo '</tr>';
                   }

                  }

                



?>


           
      
    </tbody>
  </table>
  </div>
</div>


    
    
   
    <script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>


</html> 
        
   

      


        

        


        
          
        

        
       
        
       
        
        
       
          
        
          
        
       
        
        
        

            
         
        


        
        

        
       
       

      
          
       



       
      
      
     
     
        

        
          
        
        
      

       
          
        
        
     

       
          
       
       
    

        
          
       

      


        

      


       
          
        

        
        
        
       
        
        
        
          
        
          
        
       
        
        
        

            
         
        


          
        

        
        
       

        
          
    


       

        
      


      



        
        
     

        
          
        
        
    

        
          
        

      


        

        


        
          
        

        
        
        
       
        
        
        
          
        
          
        
       
        
      
        

            
          
        


        
        

        
       
       

      
          
       



       

      
      
      
     
