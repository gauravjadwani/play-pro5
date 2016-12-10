<?php
include_once '../common_utilities/header.php';



?>
<div ng-app='myApp' ng-controller='myCtrl'>

<button ng-click="myfunction()">gaurafv</button>


<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Small Modal</button>
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
       <div class="form-group">
        <input type='text' class="form-control" name='dialog'>
      </div>
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal" ng-click='myfunction()'>Submit</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

   </div>
 </div>
 </div>
 </div>





<script>
var app = angular.module('myApp', []);

app.controller('myCtrl', function($scope, $http) {
	$scope.myfunction=function(){
  $http.post("trash4.php")
  .then(function(response) {
      $scope.myWelcome = response.data;
  });
}
});
</script>
</div>
<body>
</html>