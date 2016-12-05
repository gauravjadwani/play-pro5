<?php


include_once '../model/user.php';
include_once '../config/session.php';


//$name,$assinged_for,$created_on,$association,$initiator,$priority,$closed_on;

$name=$_POST['task'];
$assinged_for=$_POST['date'];
$initiator=$user_id;
$created_on=time();
$priority=$_POST['priority'];
$closed_on='live';
$project_id=$_POST['project_id'];


$task_id=create_task($name,$assinged_for,$created_on,$initiator,$priority,$closed_on);

$check=add_task_to_project($task_id,$project_id);

if($check!='true')
{
	echo $check;
	exit();
}
else
{

header('Location: ../view/add_task_project.php');

}

?>