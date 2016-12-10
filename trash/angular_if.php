<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>


<body ng-app="myApp" ng-contoller="myCtrl">
<input type="text" ng-model="name" ng-init="false">




<div ng-if=name=='gaurav' ng-model="q">false</div>
<input type="text" ng-bind="q">


<script type="text/javascript">
var app = angular.module("myApp", []);
app.controller("myCtrl", function($scope) {

//e=$scope.name;
var e=$scope.name;
console.log($scope.name);
alert(e);


});



/*alert(e);*/

</script>
</body>

</html>


