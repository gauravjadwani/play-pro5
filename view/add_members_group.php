            

<?php
include_once '../common_utilities/header.php';
include_once '../controller/user_groups.php'
?>
    <div class='container'  ng-app="module1" ng-controller="search_controller">
        <div class='row'>
        <div class="col-lg-6">
            <div class="col-sm-3"></div>
            <form action='../controller/add_members_group.php' method='POST'>
            <div class="col-sm-7">
                    <h1>GROUP DETAILS</h1>
                    <hr>
                    <div class="<form-group">
                        
                <select class="form-control" name="group_id">
                <option selected value='default'>no group selected</option>

                <?php
                    foreach ($list_modifier as $l) 
                    
                    {   



                ?>
      
              <option value='<?php echo $l; ?>'><?php echo $l; ?></option>
              <?php
                    }
              ?>

                <?php
                    foreach ($list_owner as $l) 
                    
                    {   



                ?>
      
              <option value='<?php echo $l; ?>'><?php echo $l; ?></option>
              <?php
                    }
              ?>




              </select>
                        &nbsp
     <textarea class="form-control" rows="3" name="list_members_modify" placeholder="MODIFY-members" id="inp" ng-focus="f_id(count=1)" onkeypress="return false;"></textarea>
    </div>
                    &nbsp
                    <div class="form-group">
                        
      <textarea class="form-control" rows="3" name="list_members_readonly" placeholder="READONLY-members" id="inp2"  ng-focus="f_id(count=2)" onkeypress="return false;"></textarea>
            {{count}}
    </div>
   
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </form>
            <div class="col-sm-2">
                
            </div>
        </div>
        <div class="col-lg-6">
       <h1>LIST OF USERS</h1> 
      
       <hr>
        <input class="form-control input-lg"  type="text" placeholder="search" ng-model="input_data">
        &nbsp
   


    <div  ng-init="d">

        <li class="alert alert-danger alert-dismissable" ng-repeat="email in d | filter:input_data" ng-click="select_email(email)" id={{email}}>
            {{email}}

        </li>

    </div>


 </div>
        </div>
</div>
        
     <script type="text/javascript">

    var module1=angular.module('module1',[]);

    module1.controller('search_controller',function($scope, $http) 
    {

        console.log($scope.count);
          
            
            $http({
                method: 'POST',
                url: '../controller/list_users.php',
                data: $.param({'id':1}),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function(response) 
            {
                console.log(response.data);
                $scope.d=response.data;

            })
               $scope.f_id=function(a)
               {
                $check=a;
                console.log($check);
               }
            $scope.select_email=function($email)
            {
                console.log('entered email'+$email);

                    if($check==1)
                    {
                document.getElementById("inp").value=$email+','+document.getElementById("inp").value;
                console.log('inp reached');
                    }
                    else if($check==2)
                    {
                     document.getElementById("inp2").value=$email+','+document.getElementById("inp2").value; 
                      console.log('inp2 reached');  
                    }
               /* document.getElementById($email).style.visibility = "hidden";*/

                document.getElementById($email).remove();




            }

        });








    </script>                          

</body>
</html>

