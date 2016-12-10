
<?php
include_once '../common_utilities/header.php';
include_once '../controller/list_user_projects.php';



?>
  
 <div ng-app="myApp" ng-controller="myCtrl">
<div class="container">
    <div class="row">
        
  

  
  
      
    <div class="table-responsive">
    <h2>PROJECTS</h2>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
        <th>Role</th>
        <th>ID</th>
        <th>NAME</th>
        <th>CREATED ON</th>
        <th>DEADLINE</th>
        <th>DESC</th>
        
        <th>ASSOCIATED_GROUP</th>
        <th>LIST OF TASKS</th>
        <th>CLOSED ON</th>
        <th>CREATED BY</th>
       <th>delete</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
            <th>Role</th>
        <th>ID</th>
        <th>NAME</th>
        <th>CREATED ON</th>
         <th>DEADLINE</th>
        <th>DESC</th>
       
        <th>ASSOCIATED_GROUP</th>
        <th>LIST OF TASKS</th>
        <th>CLOSED ON</th>
        <th>CREATED BY</th>
       <th>delete</th>
            </tr>
        </tfoot>
    <tbody>
        
  

          <?php

          
          
       $arr=array($list_project_modifier_details,$list_project_owner_details,$list_project_readonly_details );
  
  /*  print_r($list_project_readonly_details);
    exit();*/
          for ($i=0; $i<count($arr) ; $i++) 
                 { 
                 
                   if($i==2)
                    $var='true  ';


                for ($j=0;$j<count($arr[$i]);$j++) 
                        {
                        echo '<tr>';
                    if($i==0)
                      print '<td>owner</td>';
                    else if($i==1)
                       print '<td>modifier</td>';
                    else
                      print '<td>read-only</td>';


                  
                 for ($k=0;$k<count($arr[$i][$j]);$k++) 

                            {
                      /*  $arr[$i][$j][]=$role;*/
                      echo '<td>';
                        if(is_array($arr[$i][$j][$k]))
                              {
                                  foreach($arr[$i][$j][$k]as $ka)
                                      echo $ka.',';
                              
                              }
                              else if($k==9)
                                  {
                                if($arr[$i][$j][$k]==3)
                                $var=true;
                                else
                                $var=false;      
      print '<button type="button" class="btn btn-info btn-sm" onclick="projectid(this.id)" data-toggle="modal" data-target="#myModal" value="' . $arr[$i][$j][0]. '" id="' . $arr[$i][$j][0]. '" ng-init="false" ng-disabled="' .$var. '">DELETE</button>'; 
             /* continue;    */                          
                                  }


                              else
                              {
                                    echo $arr[$i][$j][$k];
                                 
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



<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
       <div class="form-group">
        <input type='text' class="form-control" name='dialog' ng-model="inp" placeholder="confirm or not-confirm">
      </div>
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="myfunction($event)" id="j" >Submit</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

   </div>
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

<script>
  function projectid(id){

project_id=id;
}


  var app = angular.module('myApp', []);



  app.controller('myCtrl', function($scope, $http) {
   
    $scope.myfunction=function(event){
       console.log($scope.inp);
       if($scope.inp=='confirm')
          { 

      $http({
        method: 'POST',
        url: '../controller/user_delete_project.php',
         data: $.param({'project_id': project_id}),
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
      }).then(function(response) 
      {
      
                  if(response.data.errors==1)
                  {
     
                  console.log(name);
                
                  $scope.name=false;

            }
    });
    }}
  });

  /*} );*/

</script>
</body>


</html> 
        
   

      


        

        


        
          
        

        
       
        
       
        
        
       
          
        
          
        
       
        
        
        

            
         
        


        
        

        
       
       

      
          
       



       
      
      
     
     
        

        
          
        
        
      

       
          
        
        
     

       
          
       
       
    

        
          
       

      


        

      


       
          
        

        
        
        
       
        
        
        
          
        
          
        
       
        
        
        

            
         
        


          
        

        
        
       

        
          
    


       

        
      


      



        
        
     

        
          
        
        
    

        
          
        

      


        

        


        
          
        

        
        
        
       
        
        
        
          
        
          
        
       
        
      
        

            
          
        


        
        

        
       
       

      
          
       



       

      
      
      
     
