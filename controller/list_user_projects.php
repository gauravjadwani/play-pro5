
<?php

include_once '../model/user.php';
include_once '../config/session.php';



$list=list_user_projects_db($user_id);
//var_dump($list);
$list_project_modifier=array();
$list_project_owner=array();
$list_project_readonly=array();

foreach($list as $project_id)
{
	$project_details=view_project_details($project_id);
	//print_r($project_details);
	$associated_group=$project_details[3];

	//echo $project_id.' associated_group::::'.$associated_group.'</br>';
	$permission=check_user_permission_for_group($associated_group,$user_id);
	//echo $permission;
  
         //array_push($list_group_permission,$key);
         if($permission=='m')
         {
         	

 				array_push($list_project_modifier,$project_id);
 				//echo 'm';
         }
         elseif($permission=='o')
         {
         	
         	//echo $permission;
 				array_push($list_project_owner,$project_id);
         //echo 'o';
         }
         elseif($permission=='r')
         {
         array_push($list_project_readonly,$project_id);	
         //echo 'r';
         }
}
//print_r($list);
//var_dump($list_project_readonly);
//print_r($list_project_owner);
//print_r($list_project_modifier);

//foreach($list as $l)
//echo $l;
//echo 'l';




?>