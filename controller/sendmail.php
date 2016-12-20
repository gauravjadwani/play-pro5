<?php


include_once '../model/user.php';
include_once '../config/session.php';

$subject='hehe';
$body='dwwddw';
$receiver_email=file_get_contents('php://input');
/*$receiver_email='gaurav.jadwani@hotmail.com';*/
$checkmail=send_mail($receiver_email,$subject,$body);




?>