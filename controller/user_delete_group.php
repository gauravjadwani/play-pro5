<?php
include_once '../model/user.php';
include_once '../config/session.php';
$group_id=$_REQUEST['group_id'];
$time=time();
$check_state_group=check_group_state($group_id);
if($check_state_group==1)
{
set_group_state($group_id,3);
group_closed($group_id,$time);
echo json_encode(array('errors'=>'0','responce'=>'success'));
}
else
{
echo json_encode(array('errors'=>'1','responce'=>'faliure'));
}
?>	