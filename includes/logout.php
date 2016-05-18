<?php 
   require 'core.inc.php';//start the sessions is in inside
   session_destroy();
   header('Location:'.$http_referer);
    ob_end_flush();

?>