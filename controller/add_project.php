<?php

include_once '../model/user.php';
include_once '../config/session.php';

$project_name=$_POST['name_of_the_project'];
$associated_group=$_POST['associated_group'];
$desc=$_POST['desc'];
$deadline=$name=$_POST['deadline'];
$list_of_tasks='"nil"';
$created_on=time();
$current_time=time();
$closed_on='live';
if($associated_group=='default')
{
   header('Location: ../view/add_project.php');
    exit();
    
}


$project_id=create_project($project_name,$created_on,$desc,$deadline,$associated_group,$list_of_tasks,$closed_on,$user_id);



header('Location: ../view/add_project.php');

?>