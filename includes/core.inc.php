<?php
ob_start();//to use the header function as 
session_start();

$current_file = $_SERVER['SCRIPT_NAME'];
 if($http_referer =isset($_SERVER['HTTP_REFERER'])){
     $http_referer = $_SERVER['HTTP_REFERER'];
}

function loggedin(){
     if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))       {
        return true;    
    }else{
        return false;
    }
}
function getuser($field){
     $query =  "SELECT `$field` FROM `users` WHERE `id` = '".$_SESSION['user_id']."'";
    if($query_run = mysql_query($query)){
        if ($query_result = mysql_result($query_run , 0 , $field)){
            return $query_result;
        }
    }
}


?>
 <ul class="nav pull-right navbar-nav">
                            <li>
                                <form class="navbar-form">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                                </form>
                            </li>
                            <li>
                                <a href="#"><i class="glyphicon glyphicon-flag"></i> <span class="badge">2</span></a>
                            </li>
                        </ul>
