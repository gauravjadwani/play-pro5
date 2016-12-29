
<?php
include_once '../config/session.php';

?>
<html>

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
    <div class="navbar-header">
      <a class="navbar-brand" href="#">play-BETA</a>
    </div>
      
      
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="dashboard.php"><span class="glyphicon glyphicon-user"></span><?php echo $name; ?></a></li>
      
    <li><a href="../view/add_task.php"><span class="glyphicon glyphicon-log-in"></span> ADD_TASK</a></li>
    <li><a href="../view/transfer_credits.php"><span class="glyphicon glyphicon-log-in"></span>Credits</a></li>
    <li><a href="../view/view_task_details.php"><span class="glyphicon glyphicon-log-in"></span>VIEW TASKS</a></li>
    <li><a href="../view/add_project.php"><span class="glyphicon glyphicon-log-in"></span>ADD PROJECT</a></li>
     <li><a href="../view/add_group.php"><span class="glyphicon glyphicon-log-in"></span> ADD_GROUP</a></li>
    <li><a href="../view/view_projects.php"><span class="glyphicon glyphicon-log-in"></span>VIEW PROJECTS</a></li>
    <li><a href="../view/view_groups.php"><span class="glyphicon glyphicon-log-in"></span>VIEW GROUPS</a></li>
    <li><a href="../view/add_members_group.php"><span class="glyphicon glyphicon-log-in"></span>ADD MEMBERS</a></li>
        
    <li><a href="../controller/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
    
    </ul>
      
    
  </div>    
</nav>
