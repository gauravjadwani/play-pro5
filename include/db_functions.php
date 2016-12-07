

<?php

include_once '../config/config.php';

//-------------------user----------------------------------------------------------------//

function jsonencode_data($data)
{
$data1=json_encode($data);
return $data1;

}
/////////////////////////////////////////////////////////////////////////////////////////////
function jsondecode_data($data)
{
$data1=json_decode($data);
return $data1;

}

/////////////////////////////////////////////////////////////////////////////////////////////
function create_user_db($email,$name,$mobile,$password,$current_time)
{
      $GLOBALS['r']->hsetnx('parent','user_id','1');
    $user_id=$GLOBALS['r']->hget('parent','user_id');
    
    
    $check=$GLOBALS['r']->hsetnx('email:user',$email,$user_id);
    if($check===false)
    {
        return -2;

    }

   $check=$GLOBALS['r']->hsetnx('contact:user',$mobile,$user_id);
    if($check===false)
    {
        return -1;
    }
     $hashed_password=password_hash($password,PASSWORD_DEFAULT);
     //$current_time=time();
    $nil_encode=jsonencode_data('nil');
   /* echo($nil_encode);
    exit(); */
    
    $check=$GLOBALS['r']->hMset('user', array('name:'.$user_id =>$name, 'mobile:'.$user_id =>$mobile,'email:'.$user_id=>$email,'password_hash:'.$user_id=>$hashed_password,'timestamp:'.$user_id=>$current_time,'list_of_groups:'.$user_id=> $nil_encode,'list_of_tasks_self:'.$user_id=> $nil_encode,'list_of_notifications:'.$user_id=> $nil_encode)); 
    
    $GLOBALS['r']->zadd("state:user",1,$user_id);
    
    $GLOBALS['r']->hincrby('parent','user_id',1);
    
     user_set_notifications_db($user_id,$current_time,'hello '.$name.'!'.' welcome to todo list!');
    
    
    return $user_id;
    
    
}
//////////////////////////////////////////////////////////////////////////////////////
function check_existence_of_user_email_db($email)
{
      $user_id=$GLOBALS['r']->hget('email:user',$email);
    //return $check_email;
    if($user_id===false)
        return 'false';
        else
            return $user_id;
    
}
//////////////////////////////////////////////////////////////////////////////////
function check_existence_of_user_mobile_db($mobile)
{
     $check=$GLOBALS['r']->hexists('contact:user',$mobile);
    return $check;
    
    
}
////////////////////////////////////////////////////////////////////////////////

function user_set_notifications_db($user_id,$current_time,$value)
{
    
//$GLOBALS['r']->zadd("notifications:".$user_id,$current_time,$value);
    $check_noti= $GLOBALS['r']->hget("user",'list_of_notifications:'.$user_id);
    /*$nil_decode=jsondecode_data($data);*/

$check_nil=jsondecode_data($check_noti);
    if($check_nil=='nil')
    {
        $d=array();
        $p=array($value,$current_time);
        array_push($d,$p);
        $j=json_encode($d);
        
        $GLOBALS['r']->hset("user",'list_of_notifications:'.$user_id,$j);
        
    }
    else
    {
        $j=json_decode($check_noti,true);
        $p=array($value,$current_time);
         array_push($j,$p);
        $q=json_encode($j);
        
         $GLOBALS['r']->hset("user",'list_of_notifications:'.$user_id,$q);
    }


}

///////////////////////////////////////////////////////////////////////////////
function user_get_notifications_db($user_id)
{
    
//$GLOBALS['r']->zadd("notifications:".$user_id,$current_time,$value);
    $list_noti=$GLOBALS['r']->hget("user",'list_of_notifications:'.$user_id);
        $notifications_array=json_decode($list_noti,true);


/*echo($notifications_array);
        exit();*/
  if($notifications_array=='nil')
    {
       
        return false;
    }
    else
    {
        
        //$p=array($value,$current_time);p
         //array_push($j,$p);

        return $notifications_array;     
    }


}

// -1 for incorrect user_id -2 for incorrect user_password -3 for barred_user
////////////////////////////////////////////////////////////////////////////

function user_login_db($user_id,$user_password)
{   
    $check_id=check_existence_of_user_id_db($user_id);
    if($check_id===false)
        return -1;
    $check_password=check_existence_of_user_password_db($user_id,$user_password);
    if($check_password===false)
        return -2;
    $check_state=check_state_user_db($user_id);
    if($check_state==-3)
        return -3;
    return true;
        
    
}
//////////////////////////////////////////////////////////////////////////////////

function check_existence_of_user_id_db($user_id)
{
    
 $check=$GLOBALS['r']->hexists('user','name:'.$user_id);
    return $check;
}






////////////////////////////////////////////////////////////////////
function check_existence_of_user_password_db($user_id,$user_password)
{
 
     $check_password=$GLOBALS['r']->hget('user','password_hash:'.$user_id);
    if(password_verify($user_password,$check_password)) 
    {
        return true;
    }
    return false;
}

//////////////////////////////////////////////////////////////////////////////



//1 is for active 0 user does not exist false barred by admin
function check_state_user_db($user_id)
{
$result=$GLOBALS['r']->zscore('state:user',$user_id);
//echo $user_id.'user_id';
    //echo "from db_func==".$result;
    return $result;
    
    
}


function view_user_details_db($user_id)
{


$user_details=array();
$list=$GLOBALS['r']->hget('user','name:'.$user_id);
array_push($user_details,$list);

$list=$GLOBALS['r']->hget('user','mobile:'.$user_id);
array_push($user_details,$list);

$list=$GLOBALS['r']->hget('user','email:'.$user_id);
array_push($user_details,$list);


$list=$GLOBALS['r']->hget('user','list_of_groups:'.$user_id);
/*print_r($list);
exit();*/
$list1=json_decode($list,true);
array_push($user_details,$list1);




/*var_dump($list);
echo 'j';
exit();
*/

$list=$GLOBALS['r']->hget('user','list_of_tasks_self:'.$user_id);
$list1=json_decode($list,true);
array_push($user_details,$list1);

return $user_details;
}


///----------------------------------user---------------------------------------///



///-----------------------------------group--------------------------------------///

function create_group_db($name,$created_on,$closed_on,$created_by,$list_of_projects)
    {
        
            $GLOBALS['r']->hsetnx('parent','group_id','1');
             $group_id=$GLOBALS['r']->hget('parent','group_id');
    $GLOBALS['r']->hMset('group',array('name:'.$group_id=>$name,'created_on:'.$group_id=>$created_on,'closed_on:'.$group_id=>$closed_on,'created_by:'.$group_id=>$created_by,'list_of_projects:'.$group_id=>$list_of_projects)); 
    $GLOBALS['r']->hincrby('parent','group_id',1);
        

        $email_user_id=$GLOBALS['r']->hget('user','email:'.$created_by);
        set_permissions_for_group_db($group_id,$email_user_id,1);

        
        //add_group_to_user_list_of_groups_db($created_by,$group_id);

       return $group_id;
        }


/////////////////////////////////////////////////////////////////////////////////////
        
function add_group_to_user_list_of_groups_db($user_id,$group_id)
{
    $list=$GLOBALS['r']->hget('user','list_of_groups:'.$user_id);
    //jsonencode_data($data)
    $list_jsondeocde=json_decode($list,true);
    if($list_jsondeocde!='nil')
    {
      
        
        
        
         //$d=array();
        //$list=array($group_id);
        //array_merge(array1)($list_jsondeocde,$list);
        
            array_push($list_jsondeocde,$group_id);
        
        $list_jsonencode=json_encode($list_jsondeocde);
        
        $GLOBALS['r']->hset('user','list_of_groups:'.$user_id,$list_jsonencode);
        
        
    }
    else
    {
           //$d=array();
        $p=array($group_id);
        //array_push($d,$p);
        $j=json_encode($p);
        
        
        //$list=array($group_id);
        //$list_jsonencode=json_encode($d);
    $GLOBALS['r']->hset('user','list_of_groups:'.$user_id,$j);
        
    }
    }
///////////////////////////////////////////////////////////////////////////

//2 is for modifier,3 is for read-only,1 is for the owner
function set_permissions_for_group_db($group_id,$list_of_email,$token)
{
 /*   $value1='nil';*/
    $group_name=$GLOBALS['r']->hget('group','name:'.$group_id);
    $split_email=split(",",$list_of_email);
    
    for($i=0;$i<sizeof($split_email);$i++)
{
    $user_id_email=$GLOBALS['r']->hget('email:user',$split_email[$i]);
    
    $GLOBALS['r']->zadd("group_permissions:".$group_id,$token,$user_id_email);
    
   
        //$user_id=$GLOBALS['r']->hget('email:user',split_email($i));
    $user_id=check_existence_of_user_email_db($split_email[$i]);    
    if($user_id!='false')
    {
    $current_time=time();
    if($token==1)
    {
    $value='you created the group '.$group_name.' ';
        }
    elseif($token==2)
    {
       $value='you were added in the group '.$group_name.' on '.$current_time.' as modifier';
        $value1='you added '.$split_email[i].' in the group '.$group_name.' as modifier';
    }
    elseif($token==3)
    {
         $value='you were added in the group '.$group_name.' on '.$current_time.' as readonly';
         $value1='you added '.$split_email[i].' in the group '.$group_name.' as readonly';

    }
        
           
            user_set_notifications_db($user_id_email,$current_time,$value);

         add_group_to_user_list_of_groups_db($user_id_email,$group_id);
}
    else
    {
        continue;
    }
}
    return 'set_permissions_db_functions';
}
//////////////////////////////////////////////////////////////////////////////////////
function get_list_user_groups_db($user_id)
{
$list=$GLOBALS['r']->hget('user','list_of_groups:'.$user_id);
$list_jsondeocde=json_decode($list,true);
/*echo 'g';
echo $list_jsondeocde;
exit();*/
    if($list_jsondeocde!='nil')
    {
    
    return $list_jsondeocde;
    }
    else
    {
        return 'no groups';
    }
}
//////////////////////////////////////////////////////////////////////////////////////
function check_user_permission_for_group_db($group_id,$user_id)
{

$p=$GLOBALS['r']->zscore('group_permissions:'.$group_id,$user_id);
    //print_r($p);
//exit();
    
        if($p==1)
            return 'o';
       elseif($p==2)
            return 'm';
       elseif($p==3)
            return 'r';
        else 
            return 'user_permission for group not found';

        //exit();

}
///////////////////////////////////////////////////////////////////////////////////////////
function view_group_details_db($group_id)
{
$group_details=array();
array_push($group_details,$group_id);
$list=$GLOBALS['r']->hget('group','name:'.$group_id);
array_push($group_details,$list);

$list=$GLOBALS['r']->hget('group','created_on:'.$group_id);
array_push($group_details,$list);

$list=$GLOBALS['r']->hget('group','closed_on:'.$group_id);
array_push($group_details,$list);


$list=$GLOBALS['r']->hget('group','created_by:'.$group_id);
array_push($group_details,$list);


$list=$GLOBALS['r']->hget('group','list_of_projects:'.$group_id);
$list1=json_decode($list,true);
array_push($group_details,$list1);

$list=list_group_members_db($group_id);
array_push($group_details,$list);


/*print_r($group_details);
exit(); */
return $group_details;
}


/////////////////////////////////////////////////////////////////////////////////////////////



function list_group_members_db($group_id)
{

$list_group_members=$GLOBALS['r']->zrangebyscore('group_permissions:'.$group_id,-3,3);


/*print_r($list_group_members);
exit();*/
return $list_group_members;


//$list1=json_decode($list,true);



}

//////////////////////////////////////////////////////////////////////////////////////////////////


////------------------------------projects---------------------------------------------////

function create_project_db($name,$created_on,$desc,$deadline,$associated_group,$list_of_tasks,$closed_on,$created_by)
{
    $current_time=time();

    $GLOBALS['r']->hsetnx('parent','project_id','1');
    $project_id=$GLOBALS['r']->hget('parent','project_id');
$GLOBALS['r']->hMset('project',array('name:'.$project_id=>$name,'created_on:'.$project_id=>$created_on,'desc:'.$project_id=>$desc,'deadline:'.$project_id=>$deadline,'associated_group:'.$project_id=>$associated_group,'list_of_tasks:'.$project_id=>$list_of_tasks,'closed_on:'.$project_id=>$closed_on,'created_by:'.$project_id=>$created_by)); 
    
    user_set_notifications_db($created_by,$current_time,'you created the project '.$name.' on  '.$created_on);
    
    user_set_notifications_db($created_by,$current_time,'you added the group id:'.$associated_group.' on  '.$created_on.' in the project '.$name);
     $GLOBALS['r']->hincrby('parent','project_id',1);
    
     add_project_list_group($project_id,$associated_group);
    return $project_id;

}

///////////////////////////////////////////////////////////////////////////////////////////////

function add_project_list_group($project_id,$group_id)
{

$list=$GLOBALS['r']->hget('group','list_of_projects:'.$group_id);
    $list_jsondeocde=json_decode($list,true);
  /*  print_r($list);
    exit();*/
    if($list_jsondeocde!='nil')
    {
        //echo 'gaiuddddra';
      //exit();
        
        
        //var_dump($list_jsondeocde);
        //exit();
         //$d=array();
        //$list=array($group_id);
        //array_merge(array1)($list_jsondeocde,$list);
        
            array_push($list_jsondeocde,$project_id);
        
        $list_jsonencode=json_encode($list_jsondeocde);
        
        $GLOBALS['r']->hset('group','list_of_projects:'.$group_id,$list_jsonencode);
        
        
    }
    else
    {
           //$d=array();
        $p=array($project_id);
        //array_push($d,$p);
        $j=json_encode($p);
        
      /*  echo 'gaiura';
        exit();*/
        //$list=array($group_id);
        //$list_jsonencode=json_encode($d);
    $GLOBALS['r']->hset('group','list_of_projects:'.$group_id,$j);
        
    }
    }

/////////////////////////////////////////////////////////////////////////////////////////////////
function view_project_details_db($project_id)
{
     $project_details=array();
    array_push($project_details,$project_id);
   
$list=$GLOBALS['r']->hget('project','name:'.$project_id);
array_push($project_details,$list);

$list=$GLOBALS['r']->hget('project','created_on:'.$project_id);
array_push($project_details,$list);

$list=$GLOBALS['r']->hget('project','deadline:'.$project_id);
array_push($project_details,$list);

$list=$GLOBALS['r']->hget('project','desc:'.$project_id);
array_push($project_details,$list);



$list=$GLOBALS['r']->hget('project','associated_group:'.$project_id);
//$list1=json_decode($list,true);
array_push($project_details,$list);


$list=$GLOBALS['r']->hget('project','list_of_tasks:'.$project_id);

//print_r($list);
$list1=json_decode($list,true);

// print_r($list1);
// exit();
array_push($project_details,$list1);

$list=$GLOBALS['r']->hget('project','closed_on:'.$project_id);
array_push($project_details,$list);

$list=$GLOBALS['r']->hget('project','created_by:'.$project_id);
array_push($project_details,$list);

//print_r($project_details);
return $project_details;



}


///////////////////////////////////////////////////////////////////////////////////////////////




    function list_user_projects_db($user_id)
    {
        $list_projects=array();
        $details=view_user_details_db($user_id);

      /*print_r($details);
        exit();*/

        $list_of_groups=$details[3];

         if($list_of_groups!='nil')
                    {
                        /*echo 'j';
                        exit();*/
                           /* var_dump($list_of_groups);
                            exit();*/
                foreach ($list_of_groups as $group_id)
                {
            $group_details=view_group_details_db($group_id);
          /*print_r($group_details);
          echo 'd';
          exit();
        */
                        //var_dump($group_details[5]);
                        if(is_array($group_details[5]))
                        {
                    foreach ($group_details[5] as $projects) 
                        array_push($list_projects,$projects);
                        }
                        else
                        {
                            array_push($list_projects,'nil');
                        }

                    


                }
            }
             /*var_dump($group_details[5]);
           print_r($list_projects);
           exit();
*/
                return $list_projects;
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////
function check_user_permission_for_project_db($project_id,$user_id)
{
    $project_details=view_project_details_db($project_id);
$associated_group=$project_details[5];
$p=$GLOBALS['r']->zscore('group_permissions:'.$associated_group,$user_id);
    
    
            if($p==1)
            return 'o';
       elseif($p==2)    
            return 'm';
       elseif($p==3)
            return 'r';
        else 
            return 'user_permission for project not found';

        //exit();

}
/////////////////////////////////////////////////////////////////////////////////////////////////



//------------------------------------tasks--------------------------------------------------//

function create_task_db($name,$assinged_for,$created_on,$initiator,$priority,$closed_on)
{
    //echo $initiator;
    //echo $priority;
    //exit();
    $GLOBALS['r']->hsetnx('parent','task_id','1');
    $task_id=$GLOBALS['r']->hget('parent','task_id');
$GLOBALS['r']->hMset('task',array('name:'.$task_id=>$name,'assinged_for:'.$task_id=>$assinged_for,'created_on:'.$task_id=>$created_on,'association:'.$task_id=>'"nil"','initiator:'.$task_id=>$initiator,'priority:'.$task_id=>$priority,'closed_on:'.$task_id=>$closed_on)); 
    
    
     $GLOBALS['r']->hincrby('parent','task_id',1);

    return $task_id;
        
    
}

function add_task_to_self_db($task_id,$user_id)
{

$check=$GLOBALS['r']->hget('task','association:'.$task_id);

/*var_dump($chek);
exit();*/
if($check=='"nil"')
{
$association='self:'.$user_id;
$GLOBALS['r']->hset('task','association:'.$task_id,$association);

add_self_task_user_list_of_tasks_db($task_id,$user_id);
return 'true';
}
else
{
    return 'task has beennn assinged';
}

}
        
///////////////////////////////////////////////////////////////////////////////////////////////

function add_self_task_user_list_of_tasks_db($task_id,$user_id)
{


$list=$GLOBALS['r']->hget('user','list_of_tasks_self:'.$user_id);
$task_details=view_task_details_self_db($task_id);
    if($list!='"nil"')
    {
      
        
        $list_jsondeocde=json_decode($list,true);
        
         //$d=array();
        //$list=array($group_id);
        //array_merge(array1)($list_jsondeocde,$list);
        
            array_push($list_jsondeocde,$task_id);
        
        $list_jsonencode=json_encode($list_jsondeocde);
        
        $GLOBALS['r']->hset('user','list_of_tasks_self:'.$user_id,$list_jsonencode);

        

user_set_notifications_db($user_id,$current_time,'you created the self task name '.$task_details[1].' on  '.$created_on.' for date:'.$task_details[7].' priority :'.$task_details[6]);
        
    }
    else
    {
           //$d=array();
        $p=array($task_id);
        //array_push($d,$p);
        $j=json_encode($p);
        
        
        //$list=array($group_id);
        //$list_jsonencode=json_encode($d);
    $GLOBALS['r']->hset('user','list_of_tasks_self:'.$user_id,$j);
    user_set_notifications_db($user_id,$current_time,'you created the self task name '.$task_details[1].' on for date:'.$task_details[7].' priority :'.$task_details[6]);
        
    }
    }
/////////////////////////////////////////////////////////////////////////////////////////////////

    function add_task_to_project_db($task_id,$project_id)
    {


$check=$GLOBALS['r']->hget('task','association:'.$task_id);
if($check=='"nil"')
{
$association='project:'.$project_id;
$GLOBALS['r']->hset('task','association:'.$task_id,$association);

add_task_project_list_of_tasks_db($task_id,$project_id);
return 'true';
}
else
{
    return 'task has been assinged';
}


    }

//////////////////////////////////////////////////////////////////////////////////////////////

    function add_task_project_list_of_tasks_db($task_id,$project_id)
    {


$list=$GLOBALS['r']->hget('project','list_of_tasks:'.$project_id);
    if($list!='"nil"')
    {
      
        
        $list_jsondeocde=json_decode($list,true);
        
         //$d=array();
        //$list=array($group_id);
        //array_merge(array1)($list_jsondeocde,$list);
        
            array_push($list_jsondeocde,$task_id);
        
        $list_jsonencode=json_encode($list_jsondeocde);
        
        $GLOBALS['r']->hset('project','list_of_tasks:'.$project_id,$list_jsonencode);
        

        
        
    }
    else
    {
           //$d=array();
        $p=array($task_id);
        //array_push($d,$p);
        $j=json_encode($p);
        
        
        //$list=array($group_id);
        //$list_jsonencode=json_encode($d);
    $GLOBALS['r']->hset('project','list_of_tasks:'.$project_id,$j);
        
    }
    }


///////////////////////////////////////////////////////////////////////////////////////////////////
    
    function view_task_details_self_db($task_id)
{
 


    $task_details=array();
    array_push($task_details,$task_id);
$list=$GLOBALS['r']->hget('task','name:'.$task_id);
array_push($task_details,$list);

$list=$GLOBALS['r']->hget('task','assinged_for:'.$task_id);
array_push($task_details,$list);

$list=$GLOBALS['r']->hget('task','created_on:'.$task_id);
array_push($task_details,$list);


$list=$GLOBALS['r']->hget('task','association:'.$task_id);
//$list1=json_decode($list,true);
array_push($task_details,$list);


$list=$GLOBALS['r']->hget('task','initiator:'.$task_id);
array_push($task_details,$list);


$list=$GLOBALS['r']->hget('task','priority:'.$task_id);
array_push($task_details,$list);

$list=$GLOBALS['r']->hget('task','closed_on:'.$task_id);
array_push($task_details,$list);


return $task_details;

}
///////////////////////////////////////////////////////////////////////////////////////////////////

function view_self_tasks_db($user_id)
{
$list_tasks_self=$GLOBALS['r']->hget('user','list_of_tasks_self:'.$user_id);

$list=json_decode($list_tasks_self,true);
/*var_dump($list);
echo 'f';
exit();
if($list!=)
return $list;
else
return 'no tasks';*/

return $list;

}

///---------------------------------------email--------------------------------------------------///

function send_mail($sender_username,$sender_password,$receiver_eamil,$data)   
{







}


///--------------------------------------sms---------------------------------------------------///









?>