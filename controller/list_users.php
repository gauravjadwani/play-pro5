

<?php




include_once '../model/user.php';
include_once '../config/session.php';

$id=$_REQUEST['id'];
if($id==1)
{
$list=get_list_state_users(1);

$json_encoded=json_encode($list);
print_r($json_encoded);
}





?>