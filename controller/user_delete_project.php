<?php
include_once '../model/user.php';
include_once '../config/session.php';
$project_id=$_REQUEST['project_id'];
$time=time();
$check_state_project=check_project_state($project_id);
if($check_state_project==1)
{
set_project_state($project_id,3);
project_closed($project_id,$time);
echo json_encode(array('errors'=>'0','responce'=>'success'));
}
else
{
echo json_encode(array('errors'=>'1','responce'=>'faliure'));
}
?>	