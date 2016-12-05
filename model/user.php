

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

//-----------------------------------------group----------------------------------//

function create_group($name,$created_on,$closed_on,$created_by,$list_of_projects)
{   
    
$check=create_group_db($name,$created_on,$closed_on,$created_by,$list_of_projects);
    return $check;

}


function set_permissions_for_group($group_id,$list_of_email,$token)
{
    $check=set_permissions_for_group_db($group_id,$list_of_email,$token);
    return $check;
}
function get_list_user_groups($user_id)
{

    $list=get_list_user_groups_db($user_id);
    return $list;
}
function   check_user_permission_for_group($group_id,$user_id)
{

    $permission=check_user_permission_for_group_db($group_id,$user_id);
    return $permission;
} 

function view_group_details($group_id)
{
    $details=view_group_details_db($group_id);
    return $details;

}



function list_group_members($group_id)
{
    $list_members=list_group_members_db($group_id);

    return $list_members;
}

//----------------------------------project----------------------------------------//

function create_project($name,$created_on,$desc,$deadline,$associated_group,$list_of_tasks,$closed_on,$created_by)
{
    $project_id=create_project_db($name,$created_on,$desc,$deadline,$associated_group,$list_of_tasks,$closed_on,$created_by);
    return $project_id;
}

function list_user_projects($user_id)
{
    $list=list_user_projects_db($user_id);
    return $list;
}
function view_project_details($project_id)
{
$project_details=view_project_details_db($project_id);
return $project_details;
}

//----------------------------------------task-----------------------------------------------//


function create_task($name,$assinged_for,$created_on,$initiator,$priority,$closed_on)
{
    $task_id=create_task_db($name,$assinged_for,$created_on,$initiator,$priority,$closed_on);
    return $task_id;

}

function add_task_to_self($task_id,$user_id)
{

$check=add_task_to_self_db($task_id,$user_id);
return $check;

}


function add_task_to_project($task_id,$project_id)
{

$check=add_task_to_project_db($task_id,$project_id);
return $check;
}

function view_self_tasks($user_id)
{

$list=view_self_tasks_db($user_id);
return $list;

}

function view_task_details_self($task_id)
{

$details=view_task_details_self_db($task_id);
return $details;


}


?>