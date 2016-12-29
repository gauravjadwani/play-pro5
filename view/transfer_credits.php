<!DOCTYPE html>
<?php
//include '../controllers/connection.php';
include_once '../controller/user_groups.php';
include_once '../controller/list_user_projects.php';


include_once '../common_utilities/header.php';
?>
    <div class="container" ng-app="myapp" ng-controller="mycontroller">
        <div class="row">
            
            <div class="col-md-4">
            <div class="row">
            	&nbsp
            	
            	<div class="col-lg-10">
            	<h1>Groups</h1>
            	 <div class="<form-group">
                      

                <select class="form-control" name="group_id">
                <option selected>No group selected</option>
                  <?php
                    foreach($list_deleted_owner as $group_id)
                    {
                  ?>
                <option value=''><?php echo $group_id;?></option>
                <?php
                }
                ?>
                </select>
                </div>
               </div>
               <div class="col-lg-2"></div>
               </div>&nbsp
               <div class="row"><div class="col-lg-10"><h1>TO</h1>&nbsp</div>
               <div class="col-lg-2"></div></div>
               <div class="row">
               <div class="col-lg-10">
                  <select class="form-control" name="group_id">
                      <option selected>No group selected</option>
                  <?php
                    foreach($list_owner_with_state as $group_id)
                    {
                  ?>
                <option value=''><?php echo $group_id;?></option>
                <?php
                }
                ?>
                </select>
                </div>
                <div class="col-lg-2">
                </div>
               </div>
               &nbsp
                <div class="row">
                 <div class="col-lg-10">
                 <button type="" class="btn btn-primary form-control" ng-click="click($event)" id="1">Submit</button>
               </div>
               </div>
               


               </div>
                
  
                
            <div class="col-md-4">
            <div class="row">
              &nbsp
              
              <div class="col-lg-10">
              <h1>Project</h1>
               <div class="<form-group">
                        
                <select class="form-control" name="group_id">
                <option selected value='default'>No Project selected</option>
                </select>
                </div>
               </div>
               <div class="col-lg-2"></div>
               </div>&nbsp
               <div class="row"><div class="col-lg-10"><h1>TO</h1>&nbsp</div>
               <div class="col-lg-2"></div></div>
               <div class="row">
               <div class="col-lg-10">
               <h1>Groups</h1>
                  <select class="form-control" name="group_id">
                      <option selected>No group selected</option>
                  <?php
                    foreach($list_owner_with_state as $group_id)
                    {
                  ?>
                <option value=''><?php echo $group_id;?></option>
                <?php
                }
                ?>
                </select>
                </div>
                <div class="col-lg-2">
                </div>
               </div>
               &nbsp
                <div class="row">
                 <div class="col-lg-10">
                 <button type="" class="btn btn-primary form-control" ng-click="click($event)" id="2">Submit</button>
               </div>
               </div>
               


               </div>
                	
            <div class="col-md-4">
            <div class="row">
              &nbsp
              
              <div class="col-lg-10">
              <h1>Tasks</h1>
               <div class="<form-group">
                        
                <select class="form-control" name="group_id">
                <option selected value='default'>No Task selected</option>
                </select>
                </div>
               </div>
               <div class="col-lg-2"></div>
               </div>&nbsp
               <div class="row"><div class="col-lg-10"><h1>TO</h1>&nbsp</div>
               <div class="col-lg-2"></div></div>
               <div class="row">
               <div class="col-lg-10">
                  <select class="form-control" name="group_id">
                <option selected value='default'>No Task selected</option>
                </select>
                </div>
                <div class="col-lg-2">
                </div>

               </div>
               &nbsp
                <div class="row">
                 <div class="col-lg-10">
                 <button class="btn btn-primary form-control" ng-click="click($event)" id="3" >Submit</button>

               </div>
               </div>
               


               </div>
        </div>
        </div>
        </body>
        <script type="text/javascript">
          var app=angular.module('myapp',[]);
          app.controller('mycontroller',function($scope,$http){

            $scope.click=function(a){
              //console.log('cicl'.a);
              //console.log(event.currentTarget);
            console.log(a.target.id);
                                    }

          });
        </script>
        </html>
      
