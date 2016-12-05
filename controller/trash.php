
<?php

include_once '../model/user.php';
include_once '../config/session.php';



$list=list_user_projects_db($user_id);

foreach($list as $project_id)
{
	$project_details=view_project_details($project_id);
	//print_r($project_details);
foreach ($project_details as$p) 
{
echo $p.'<br>';	# code...
}

}

$v='null';
$j=json_decode($v);
echo $j;

?>