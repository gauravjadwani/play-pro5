<?php

include_once '../model/user.php';
include_once '../controller/user_groups.php';



$list_readonly_details=array();
$list_modifier_details=array();
$list_owner_details=array();


/*var_dump($list_owner);
exit();*/
if(!empty($list_owner))
{

foreach ($list_owner as $group)
 {

	$details=view_group_details($group);
	array_push($list_owner_details,$details);



}
}
if(!empty($list_readonly))
{

foreach ($list_readonly as $group) {

	$details=view_group_details($group);
	array_push($list_readonly_details,$details);



}


}
if(!empty($list_modifier))
{

foreach ($list_modifier as $group) 
{

	$details=view_group_details($group);
	array_push($list_modifier_details,$details);



}
}
/*
print_r($list_readonly_details);
print_r($list_owner_details);
print_r($list_modifier_details);*/
/*
print_r($list_owner_details);*/
?>