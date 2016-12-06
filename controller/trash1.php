<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">play-BETA</a>
    </div>
      
      
    <ul class="nav navbar-nav navbar-right">
      
      
    <li><a href="../view/sign_up.html"><i class="fa fa-sign-in" aria-hidden="true"></i>Signup</a></li>
    
    </ul>
      
    
  </div>
</nav>
  
<div class="container">
  

<?php
if(true)
{
  ?>
<div data-toggle="modal" data-target="modalRegister">
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
<script type="text/javascript">


    $(window).load(function(){
        $('#myModal').modal('show');
    });
</script>


<?php
}


?>


  <div class="row">



      <div class="col-md-3">
          </div>
      <div class="col-md-6">
          <form class = "form-horizontal" role = "form" action="../controller/user_login.php" method="post">
   
   <div class = "form-group">
      <label for = "email" class = "col-sm-2 control-label">USER_ID</label>
    
      <div class = "col-sm-10">
         <input type = "number" class = "form-control" name = "id" placeholder ="Enter Email" required>
      </div>
   </div>
   <div class = "form-group">
      <label for = "passwd" class = "col-sm-2 control-label">Password</label>
    
      <div class = "col-sm-10">
         <input type = "password" class = "form-control" name = "passwd" placeholder ="Enter Password" required>
      </div>
   </div>
     <div class = "form-group">
      <div class = "col-sm-offset-2 col-sm-10">
         <button type = "submit" class = "btn btn-default">Log   in</button>
      </div>
   </div>
        
              
</form>
          
          
          </div>
      <div class="col-md-3">
      </div>
              
</div>
</div>

</body>
</html>
