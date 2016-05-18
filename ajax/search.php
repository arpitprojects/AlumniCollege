<?php
require '../includes/connect.inc.php';
if(isset($_POST['search_term']) == true && empty($_POST['search_term']) == false){
         $search_term = mysql_real_escape_string($_POST['search_term']);
        $query = mysql_query("SELECT `firstname` , `lastname` FROM `users` WHERE `firstname` LIKE '$search_term%' OR `lastname` LIKE '$search_term%'");
        while(($row = mysql_fetch_assoc($query))  !== false){
           // echo $row['firstname'];
            //loopblibjb
            echo '<li class="collection-item">', $row['firstname'],' ',$row['lastname'] ,'</li>';
        }
}

?>

