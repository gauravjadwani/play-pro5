<?php

include_once '../model/user.php';
include_once '../config/session.php';

$group_id=$_POST['group_id'];
$group_list_members_readonly=$_POST['list_members_readonly'];
$group_list_members_modify=$_POST['list_members_modify'];

$group_state=check_group_state($group_id);

//$group_id=create_group($group_name,$created_on,$closed_on,$user_id,$list_of_projects);
//set_permissions_for_group($group_id,$email,1);
if($group_state==1)
{
if(isset($group_list_members_modify)&&$group_list_members_modify!='')
{ 
set_permissions_for_group($group_id,$group_list_members_modify,2);
//add_group_to_user_list_of_groups($user_id,$group_id);
}
if(isset($group_list_members_readonly)&&$group_list_members_readonly!='')
{
set_permissions_for_group($group_id,$group_list_members_readonly,3);
}
}
/*else
{

	echo 'else add members_group';
	exit();
}*/
header('Location: ../view/add_group.php');




?>