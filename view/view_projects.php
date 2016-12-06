
<?php
include_once '../common_utilities/header.php';
include_once '../controller/list_user_projects.php';



?>
  
  <body>
<div class="container">
    <div class="row">
        
  

  
  
      
    <div class="table-responsive">
    <h2>PROJECTS</h2>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
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
    <tbody>
        
  

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
        
   

      


        

        


        
          
        

        
       
        
       
        
        
       
          
        
          
        
       
        
        
        

            
         
        


        
        

        
       
       

      
          
       



       
      
      
     
     
        

        
          
        
        
      

       
          
        
        
     

       
          
       
       
    

        
          
       

      


        

      


       
          
        

        
        
        
       
        
        
        
          
        
          
        
       
        
        
        

            
         
        


          
        

        
        
       

        
          
    


       

        
      


      



        
        
     

        
          
        
        
    

        
          
        

      


        

        


        
          
        

        
        
        
       
        
        
        
          
        
          
        
       
        
      
        

            
          
        


        
        

        
       
       

      
          
       



       

      
      
      
     
