<?php
/**//*
include_once '../model/user.php';
include_once '../config/session.php';

$e=$_REQUEST['data'];
$GLOBALS['r']->set('roll',$e);*/

$value=$_REQUEST['group_id'];

if(!empty($value))
{
session_start();
$_SESSION['k']=$value;


/*var_dump($value);*/

}




?>