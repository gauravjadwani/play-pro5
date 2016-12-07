<?php

include_once '../model/user.php';
include_once '../config/session.php';

$list_tasks=view_self_tasks_db($user_id);

if($list_tasks!='nil')
{
	//$details_self_tasks=array();

	/*var_dump($list_tasks);
	exit();*/
foreach($list_tasks as $task)
{
$details=view_task_details_self($task);
//array_push($details_self_tasks,$details);


 echo '<button class="alert alert-danger alert-dismissable btn-group-justified"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$details[1].'</button>&nbsp';
}
}












?>