<?php
//$GLOBALS['ip'];
$GLOBALS['ip']='127.0.0.1';
$GLOBALS['r']=new Redis;
//$r=new Redis();
$GLOBALS['r']->connect($GLOBALS['ip']);
$GLOBALS['sender_email']='demo.email.sender2016@gmail.com';
$GLOBALS['sender_password']='dowhatyoulove';
$GLOBALS['sender_name']='Team E-guru';

?>