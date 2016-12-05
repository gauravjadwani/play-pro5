<?php

include_once '../model/user.php';
include_once '../config/session.php';

$list_tasks=view_self_tasks_db($user_id);

if($list_tasks!='no tasks')
{
	//$details_self_tasks=array();
foreach($list_tasks as $task)
{
$details=view_task_details_self($task);
//array_push($details_self_tasks,$details);


 echo '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$details[1].'</div>&nbsp';
}
}












?>