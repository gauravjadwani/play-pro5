<!DOCTYPE html>
<html lang="en" ng-app="module1">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- /*bootstrap*/ -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<!-- angular -->
<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.2/angular.min.js"></script>
<!-- 

/*datatbles*/ -->

<!-- <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.9.4/js/jquery.dataTables.js"></script> -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.9.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


  




<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

  

  
    

 
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">


 </head>

<body>



    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header"> <a class="navbar-brand" href="#">play-BETA</a> </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.html"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
                    <div class="col-md-6">
            
            <div class="col-md-12">
                <form class="form-horizontal" role="form" ng-controller="signupcontroller">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" ng-model="user.name"> 
                            </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="passwd" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Enter Email"  ng-model="user.email"> </div>
                    </div>
                    <div class="form-group">
                        <label for="tel" class="col-sm-2 control-label">Mobile</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="mobile" pattern="[7-9]{1}[0-9]{9}" placeholder="Enter mobile"  ng-model="user.mobile"> </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="passwd" placeholder="Enter Password"  ng-model="user.passwd"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default" ng-click="submit()" id="q">Sign up</button>
                            <button type = "submit" class = "btn btn-default" ng-click="reset()">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
                
                    <div class="col-md-6">
                    
      <div class="col-md-12">
           <form class="form-horizontal" role="form" ng-controller="logincontroller" action="../controller/user_login.php" method="POST">
   
   <div class = "form-group" >
      <label for = "id" class = "col-sm-2 control-label">USER_ID</label>
        
      <div class = "col-sm-10">
         <input type = "number" class = "form-control" placeholder ="Enter Id" ng-model="user.id" ng-keydown="onkeydown($event)" name="id">
      </div>
   </div>
   <div class = "form-group">
      <label for = "passwd" class = "col-sm-2 control-label">Password</label>
        
      <div class = "col-sm-10">
         <input type = "password" class = "form-control" placeholder ="Enter Password" ng-model="user.password" name="passwd" METHOD="POST">
      </div>
   </div>
     <div class = "form-group">
      <div class = "col-sm-offset-2 col-sm-10">
        
         <input type="submit" class="btn btn-default" value="Log in">
         <button type = "reset" class = "btn btn-default">Reset</button>
      </div>
   </div>
        
        </form>      
</div>
          
          
          
      
                    </div>
        </div>
    </div>
   


<script type="text/javascript">
  


 /* var app = angular.module('myApp', []);*/
 var module1= angular.module('module1',[]);

module1.controller('signupcontroller', function($scope, $http) 
  {
/*    console.log($scope.name);*/
   $scope.master = {name:"",email:"",mobile:"",password:""};
  /* $scope.user={name:""}*/
   /*console.log(name);*/

    $scope.submit=function()
    {

       console.log('clicked'+$scope.user.name);
        $scope.json = angular.toJson($scope.user);
        console.log($scope.json);

         var mysubmit= document.getElementById("q");
  var myimg = document.createElement("img");
  myimg.src="../common_utilities/p.gif";
  myimg.id="q";
  mysubmit.parentNode.replaceChild(myimg, mysubmit);
  $scope.user=$scope.master;




          //-----------ajax call-------------//


$http({
        method: 'POST',
        url: '../controller/user_sign_up.php',
         data: $.param({'data': $scope.json}),
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
      }).then(function(response) 
      {
      
                  /*if(response.data.errors==1)
                  {
     
                  console.log(name);
                
                  $scope.name=false;

            }*/
            if(response.data=="successfull")
            {
              console.log("ss");
              var gifimg= document.getElementById("q");
              /*console.log(gifimg);*/
  var inp = document.createElement("input");
   inp.id="q";
  inp.type="submit";
  inp.className="btn btn-default";
  inp.value="signup";
 /* inp.class="btn btn-default";*/
  console.log(inp);
  gifimg.parentNode.replaceChild(inp,gifimg);
            }

    
    });

       $scope.reset=function()
       {
          $scope.user = angular.copy($scope.master);

       }
         /* $scope.reset();*/
       }
});




  /*login*/



module1.controller('logincontroller',function($scope,$http) 
  {
   
   /* console.log("dw");*/
    $scope.onkeydown= function($event){
 
     /*console.log("d");*/
     var clicked=$event.which;
     if(clicked>=37&&clicked<=41)
     {
      alert("navigate");
     }
    console.log($event.which);
/*console.log('clicked_login_userid');*/
    };
     
    $scope.login=function()
    {
       console.log('clicked_submit_login');
    
    }
      

       }
     );

</script>

</body>

</html>