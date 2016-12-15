<?php
/*include_once '../controller/list_users.php';*/

/*print_r($json_encoded);*/
include_once '../common_utilities/header.php'

?>

<div ng-app="module1" ng-controller="search_controller" ng-init="d">
<input type="" name="" ng-model="input_data" id="inp">
<button ng-repeat="email in d | filter:input_data" ng-click="select_email(email)" id={{email}}>
{{email}}
</button>

</div>

<script type="text/javascript">
	
var module1=angular.module('module1',[]);

module1.controller('search_controller',function($scope, $http) 
  {
  			$scope.input_data=$scope.email;
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


      	$scope.select_email=function($email)
      	{

      			console.log('entered email'+$email);

      				document.getElementById("inp").value=$email+','+document.getElementById("inp").value;
      				document.getElementById($email).style.visibility = "hidden";





      	}

  });




  



</script>