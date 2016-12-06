
<?php
include_once '../common_utilities/header.php';
include_once '../controller/list_user_projects.php';



?>
  
  <body>
<div class="container">
    <div class="row">
        
  
  <h2>VIEW YOUR PROJECTS</h2>
  
  <div class="table-responsive">
  <table class="table" id='example'>
      
    <div class="table-responsive">
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


      if($list_project_owner_details)
      {

      foreach($list_project_owner_details as $d)
      {
          echo '<tr>';
          ?>
    
        <td><?php echo $d[0];?></td>
          <td><?php echo $d[1]; ?></td>
            <td><?php echo $d[2];?></td>
                 <td><?php echo $d[4];?></td>  
                      <td><?php echo $d[3];?></td>
                             <td><?php echo($d[5]);?></td>
       
          
      
        <td><?php if($d[6])foreach($d[6] as $pro)echo $pro.','; ?></td>
     
          <td><?php echo $d[7];?></td>
               <td><?php echo $d[8];?></td>
          
                     <?php echo '</tr>';    } ?>
           
                          <?php }  ?>
    
 
      
     
<?php


      if($list_project_modifier_details)
      {

      foreach($list_project_modifier_details as $d)
      {
          echo '<tr>';
 ?>
        <td><?php echo $d[0];?></td>
        <td><?php echo $d[1]; ?></td>
          <td><?php echo $d[2]; ?> </td>
             <td><?php echo $d[4];?> </td>
                  <td><?php echo $d[3]; ?></td>
                      <td><?php echo($d[5]); ?></td>
                        <td><?php if($d[6])foreach($d[6] as $pro)echo $pro.','; ?></td>
                       <td><?php echo $d[8];?></td>
    
                           <?php } ?></tr>
                            <?php  }  ?>
     
      
      
     

      <?php


      if($list_project_readonly_details)
      {

      foreach($list_project_readonly_details as $d)
      {
          echo '<tr>';
?>
    
        <td><?php echo $d[0];?></td>
        <td><?php echo $d[1];?></td>
          <td><?php echo $d[2];?></td>
        <td><?php echo $d[4];?></td>
          <td><?php echo $d[3];?></td>
        <td><?php echo($d[5]);?></td>
        
      <td> <?php if($d[6])foreach($d[6] as $pro)echo $pro.',';?></td>
            <td><?php echo $d[7];?></td>
             <td><?php echo $d[8];?></td>
               <?php } ?></tr><?php } ?>
        
           
      
    </tbody>
  </table>
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
        
   

      


        

        


        
          
        

        
       
        
       
        
        
       
          
        
          
        
       
        
        
        

            
         
        


        
        

        
       
       

      
          
       



       
      
      
     
     
        

        
          
        
        
      

       
          
        
        
     

       
          
       
       
    

        
          
       

      


        

      


       
          
        

        
        
        
       
        
        
        
          
        
          
        
       
        
        
        

            
         
        


          
        

        
        
       

        
          
    


       

        
      


      



        
        
     

        
          
        
        
    

        
          
        

      


        

        


        
          
        

        
        
        
       
        
        
        
          
        
          
        
       
        
      
        

            
          
        


        
        

        
       
       

      
          
       



       

      
      
      
     
