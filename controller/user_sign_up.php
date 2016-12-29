<?php

include_once '../model/user.php';
require '../vendor/autoload.php';


/*$name=$_REQUEST['name'];
$password=$_REQUEST['passwd'];
$email=$_REQUEST['email'];
$mobile=$_REQUEST['mobile'];*/



$json_data=$_REQUEST['data'];
$data=json_decode($json_data,true);


$name=$data['name'];
$password=$data['passwd'];
$email=$data['email'];
$mobile=$data['mobile'];

/*print_r($data);*/
/*exit();*/
$current_time=time();

if($name!=""||$password!=""||$email!=""||$mobile!="")
{
$result=check_existence_of_user_email($email);
if($result>0)
{
    echo "email exist";
//$result=
exit();
}

$result=check_existence_of_user_mobile($mobile);
if($result===true)
{
    echo "contact exist";
//$result=
exit();
}

$result=create_user($email,$name,$mobile,$password,$current_time);
if($result>0)
{
   /* header("Location: ../view/login.html");*/
    	$data=$arrayName = array('email' =>$email ,'id' =>$result);
    	$json_data=json_encode($data);

//----------------sending asyn request--------------------------------------------//
    $client = new \GuzzleHttp\Client();

$request = new \GuzzleHttp\Psr7\Request('POST', 'http://localhost/play-pro5/controller/sendmail.php',array() ,$json_data);

$promise = $client->sendAsync($request)->then(function ($response) {
   /* echo 'I completed! ' . $response->getBody();*/
});
$promise->wait();
echo "successfull";

}
else
    echo 'else user_sign_up.php==='.$result;
}
else
{
	echo "fields are blank";
}
?>