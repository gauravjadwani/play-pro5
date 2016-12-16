            

<?php
include_once '../common_utilities/header.php';
/*include_once '../controller/list_users.php';*/

?>
<div class='container' ng-app="module1" ng-controller="search_controller">
<div class="row">
<div class="col-lg-6">
    

    <form action='../controller/add_group.php' method='POST'>
        <h1>GROUP DETAILS</h1>
        <hr>
        <div class="<form-group">
            <input class="form-control input-lg" name="name_of_group" type="text" placeholder="name of the group">
            &nbsp
            <textarea class="form-control" rows="3" name="list_members_modify" placeholder="MODIFY-members" ng-model="input_data" id="inp" ng-focus="f_id(count=1)"></textarea>
        </div>

        &nbsp
        <div class="form-group">
            <textarea class="form-control" rows="3" name="list_members_readonly" placeholder="READONLY-members" ng-model="input_data" id="inp2"  ng-focus="f_id(count=2)">
            </textarea>
            {{count}}
        </div>

        <button type="submit" class="btn btn-default">Submit</button>


    </form>
    </div>

    <div class="col-lg-6">
       <h1>LIST OF USERS</h1> 
       <hr>
   


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
            // console.log("f");
            
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
               /* console.log($(this).attr('id'));

*/
                    console.log(a);
               }
            $scope.select_email=function($email)
            {

                console.log('entered email'+$email);

                    if($scope.f_id=='inp')
                    {
                document.getElementById("inp").value=$email+','+document.getElementById("inp").value;
                console.log('inp reached');
                    }
                    else
                    {
                     document.getElementById("inp2").value=$email+','+document.getElementById("inp2").value; 
                      console.log('inp2 reached');  
                    }
                document.getElementById($email).style.visibility = "hidden";





            }

        });








    </script>               

</body>
</html>

