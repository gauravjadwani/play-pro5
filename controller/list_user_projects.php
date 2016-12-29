
<?php

include_once '../model/user.php';
include_once '../config/session.php';



$list=list_user_projects_db($user_id);
/*print_r($list);
exit();*/
$list_project_modifier=array();
$list_project_owner=array();
$list_project_readonly=array();


$list_project_modifier_details=array();
$list_project_owner_details=array();
$list_project_readonly_details=array();

$list_project_modifier_state=array();
$list_project_owner_state=array();
$list_project_readonly_state=array();

foreach($list as $project_id)
{
	/*$project_details=view_project_details($project_id);
	//print_r($project_details);
	$associated_group=$project_details[5];

	//echo $project_id.' associated_group::::'.$associated_group.'</br>';
	$permission=check_user_permission_for_group($associated_group,$user_id);
	//echo $permission;
  */
         //array_push($list_group_permission,$key);

      $state_project=check_project_state($project_id);

      $permission=check_user_permission_for_project($project_id,$user_id);



         if($permission=='m')
         {
         	array_push($list_project_modifier,$project_id);
               $details=view_project_details($project_id);
               array_push($list_project_modifier_details,$details);
            if($state_project==3)
            {
 				 array_push($list_project_modifier_state,$project_id);
 				//echo 'm';
         }
         }
         elseif($permission=='o')
         {
         	array_push($list_project_owner,$project_id);


            $details=view_project_details($project_id);
            array_push($list_project_owner_details,$details);
         	//echo $permission;
            if($state_project==3)
            {
 				array_push($list_project_owner_state,$project_id);
         }
         //echo 'o';
         }
         elseif($permission=='r')
         {
            array_push($list_project_readonly,$project_id);


         $details=view_project_details($project_id);
            array_push($list_project_readonly_details,$details);
            if($state_project==3)
            {
         array_push($list_project_readonly_state,$project_id);
         }
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
/*print_r($list_project_owner_details);
print_r($list_project_modifier_details);
print_r($list_project_readonly_details);*/
//exit();


?>