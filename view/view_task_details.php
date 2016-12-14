
<?php
include_once '../common_utilities/header.php';
include_once '../controller/view_user_projects_tasks.php';



?>
  
 <div ng-app="myApp" ng-controller="myCtrl">
<div class="container">
    <div class="row">
        
  

  
  
      
    <div class="table-responsive">
    <h2>PROJECTS</h2>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
       
        <th>ID</th>
        <th>NAME</th>
        <th>ASSIGNED FOR</th>
        <th>CREATED ON</th>
        <th>ASSOCIATION</th>
        
        <th>INITIATOR</th>
        <th>PRIORITY</th>
        <th>CLOSED ON</th>
        
       <th>delete</th>
            </tr>
        </thead>
        <tfoot>
           <tr>
       
        <th>ID</th>
        <th>NAME</th>
        <th>ASSIGNED FOR</th>
        <th>CREATED ON</th>
        <th>ASSOCIATION</th>
        
        <th>INITIATOR</th>
        <th>PRIORITY</th>
        <th>CLOSED ON</th>
        
       <th>delete</th>
            </tr>
        </tfoot>
    <tbody>
        
  

           <?php
               /* print_r($task_details_array);
                exit();*/

              for($i=0;$i<count($task_details_array);$i++)
              {

             /*echo 'count is '.count($task_details_array).'<br>';*/
             echo '<tr>';
                  for($j=0;$j<count($task_details_array[$i]);$j++)

                  {
                        if($j==8)
                        {
                print '<td><button type="button" class="btn btn-info btn-sm" onclick="projectid(this.id)" data-toggle="modal" data-target="#myModal" value="" id="" ng-init="false" ng-disabled="">DELETE</button></td>'; 

                        }
                        else
                        {
                      echo '<td>'.$task_details_array[$i][$j].'</td>';
                        }
                  }
                  echo '</tr>';

               


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
        <h4 class="modal-title">Confirmation Box</h4>
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
        
   
