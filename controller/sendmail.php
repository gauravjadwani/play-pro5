<?php


include_once '../model/user.php';
include_once '../config/session.php';

$subject='hehe';
/*$body='dwwddw';*/
$json_data=file_get_contents('php://input');
$data=json_decode($json_data,true);



/*$receiver_email='gaurav.jadwani@hotmail.com';*/
$checkmail=send_mail($data['email'],$subject,'the id of the user is:'.$data['id']);




?>