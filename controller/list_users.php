<?php
include_once '../model/user.php';
include_once '../config/session.php';

$id=$_REQUEST['id'];
$email=$_SESSION['email'];
if($id==1)
{
$list=get_list_state_users(1);

$json_encoded=json_encode($list);
print_r($json_encoded);
}
else if($id==2)
{

$list=get_list_state_users(1);
$a= array_diff($list, array($email));
$b=array_values($a);

$json_encoded=json_encode($b);
print_r($json_encoded);
/*exit();*/


}





?>