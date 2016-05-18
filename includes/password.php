<?php
    include_once 'connect.inc.php';
    include_once 'core.inc.php';


function  password_hashing($password){
        $cost = 10;
       $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $salt = sprintf("$2a$%02d$" , $cost).$salt;
        $hash = crypt($password , $salt);
        return $hash;
        
    }
//$arpit = password_hashing(123);
//echo $arpit. "<br/>";
?>