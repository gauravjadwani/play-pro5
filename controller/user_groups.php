<?php

include_once '../model/user.php';
include_once '../config/session.php';

$list_groups=get_list_user_groups($user_id);

//print_r($list_groups);
//exit();
if($list_groups!='no groups')
{

$list_readonly=array();
$list_modifier=array();
$list_owner=array();


foreach ($list_groups as $group_id) 
{
	
$check_permission=check_user_permission_for_group($group_id,$user_id);
if($check_permission=='m')
array_push($list_modifier,$group_id);
elseif($check_permission=='r')
	array_push($list_readonly,$group_id);
elseif($check_permission=='o')
	array_push($list_owner,$group_id);



}
}
?>