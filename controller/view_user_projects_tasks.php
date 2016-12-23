<?php

include_once '../model/user.php';
/*include_once '../controller/user_groups.php';*/

$task_details_array=array();

$list_projects_tasks=view_user_projects_tasks($user_id);

/*print_r($list_projects_tasks);
exit();*/
if($list_projects_tasks[0]!='nil')
{
foreach($list_projects_tasks as $p_tasks)
{

$task_detail=view_task_details_self_db($p_tasks);
/*print_r($task_detail);*/
array_push($task_details_array,$task_detail);


}
}
else
{

	array_push($task_details_array,'nil');
}






?>