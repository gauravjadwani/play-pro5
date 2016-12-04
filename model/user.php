

<?php 

include '../include/db_functions.php';
//-------------------user----------------------------------------------------//
function create_user($email,$name,$mobile,$password,$current_time)
{
$check=create_user_db($email,$name,$mobile,$password,$current_time);
return $check;
}


function check_existence_of_user_email($email)
{
    $user_id=check_existence_of_user_email_db($email);
        return $user_id;
        //return $user_id;
        
}


function check_existence_of_user_mobile($mobile)
{
    $check=check_existence_of_user_mobile_db($mobile);
        return $check;
        
}


function state_user($user_id)
{
    
        $check=check_state_user_db($user_id);
        return $check;
        
}


function user_get_notifications($user_id)
{
    
    $values=user_get_notifications_db($user_id);
    
    return $values;
    
}
function user_set_notifications($user_id,$current_time,$value)
{
    
    user_set_notifications_db($user_id,$current_time,$value);
    
}

function user_login($user_id,$user_password)
{
$check_login=user_login_db($user_id,$user_password);
return $check_login;
}




?>