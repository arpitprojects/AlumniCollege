<?php 
require 'includes/core.inc.php';
require 'includes/connect.inc.php';
if(loggedin()){
    include 'includes/link.php';
    include 'includes/header.php';
    echo '<center>';
    echo 'YOU ARE ALREADY LOGGED IN ';
    echo '<br>';
    echo '<a href="includes/logout.php" class="btn waves-effect waves-light" style="background-color:#2962ff";>YOU CAN LOGOUT HERE!! </a>';
    echo '</center>';
    ?>
<br>
<div class="row">
    <center>
    <div class="col m6 s12 offset-m3">
<img src="img/makaut.png" style="text-align:center" class="circle materializeboxed" height="300" width="300"/>
    </div>
    </center> 
</div>
<br><br><br><br><br></br>
<?php
    include 'includes/footer.php';
    include 'includes/sidelast.php';
    include 'includes/script.php';
}
else
{
    ?>
<?php include 'includes/link.php';?>
<?php include 'includes/header.php';?>
<?php include 'includes/password.php';?>
    <div class="container">
        <div class="row">
            <center>
            <?php
                	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;

}
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $pass =stripslashes($_POST['password']);
        $password = md5($pass);
        //$flag = 1;
        if(!empty($email) && !empty($password)){
            //echo 'Ok';
            $query= "SELECT `id` ,`valid` FROM `users` WHERE `email` = '".mysql_real_escape_string($email)."' AND `password` = '".mysql_real_escape_string($password)."'";
            if($query_run = mysql_query($query)) {
                    $query_num_rows  =mysql_num_rows($query_run);
                    $query_fetch_array = mysql_fetch_array($query_run);
                $flag = $query_fetch_array['valid'];
                        if($query_num_rows == 0  ){
                            echo 'Invalid username or password!!';
            
                        }else if($flag == 0){
                            echo 'Sorry Your account not verified yet , Give us some time !!!';
                        }
                        
                        else if($query_num_rows == 1) {
                        $user_id  =mysql_result($query_run , 0, 'id');
                        $_SESSION['user_id'] = $user_id;
                        header('Location:user.php');
                        ob_end_flush();
                }else{}
            }//if query_run closed
        }else{
            //ye !empty wala query
            echo'You Must supply Username and password';
        }
    }
    ?>
            <form action="" method="POST">
            <div class="col s12 m6 offset-m3">
                <h3 class="align">Login Here!!</h3>
                  <div class="input-field">
                  <input id="email" name="email" type="email" class="validate">
                  <label for="email">Email</label>
                </div>
                <br>
                 <div class="input-field">
                  <input name="password" id="password" type="password" class="validate">
                  <label for="password">Password</label>
                </div>
                <br/>
                
                <button type="submit"  style="background-color:#2962ff;text-align:center; text-transform:capitalize;" class="waves-effect waves-light btn">Hurry Up explore this world</button>
                <br><br><br>
                <a href="forgotpass.php"  style="background-color:#2962ff;text-align:center; text-transform:capitalize;" class="waves-effect waves-light btn">Forgotten Something click here </a>
            </div>
            </center>
                </form>
        </div>
    </div>
 <!-- Modal Structure -->
  

<?php include 'includes/footer.php';?>
<?php include 'includes/script.php'; ?>
<?php include 'includes/sidelast.php';?>
<style>
    /* label color */
   .input-field label {
     color: #2962ff !important;
    font-size:20px;
   }
   /* label focus color */
   .input-field input[type=text]:focus + label {
     color: #448aff;
   }
   /* label underline focus color */
   .input-field input[type=text]:focus {
     border-bottom: 1px solid #2962ff;
     box-shadow: 0 1px 0 0 #82b1ff;
   }
   /* valid color */
   .input-field input[type=text].valid {
     border-bottom: 1px solid #2962ff;
     box-shadow: 0 1px 0 0 #82b1ff;
   }
   /* invalid color */
   .input-field input[type=text].invalid {
     border-bottom: 1px solid red;
     box-shadow: 0 1px 0 0 red;
   }
   /* icon prefix focus color */
   .input-field .prefix.active {
     color: #2962ff;
   }

</style>
<style>
    /* label color */
   .input-field label {
     color: #2962ff !important;
    font-size:20px;
   }
   /* label focus color */
   .input-field input[type=text]:focus + label {
     color: #448aff;
   }
     .input-field input[type=email]:focus + label {
     color: #448aff;
   }
     .input-field input[type=password]:focus + label {
     color: #448aff;
   }
      .input-field input[type=number]:focus + label {
     color: #448aff;
   }
      .input-field input[type=date]:focus + label {
     color: #448aff;
   }
      .input-field input[type=file]:focus + label {
     color: #448aff;
   }
   /* label underline focus color */
   .input-field input[type=text]:focus {
     border-bottom: 1px solid #2962ff;
     box-shadow: 0 1px 0 0 #82b1ff;
   }
     .input-field input[type=email]:focus {
     border-bottom: 1px solid #2962ff;
     box-shadow: 0 1px 0 0 #82b1ff;
   }
        .input-field input[type=password]:focus {
     border-bottom: 1px solid #2962ff;
     box-shadow: 0 1px 0 0 #82b1ff;
   }
        .input-field input[type=date]:focus {
     border-bottom: 1px solid #2962ff;
     box-shadow: 0 1px 0 0 #82b1ff;
   }
        .input-field input[type=file]:focus {
     border-bottom: 1px solid #2962ff;
     box-shadow: 0 1px 0 0 #82b1ff;
   }
          .input-field input[type=number]:focus {
     border-bottom: 1px solid #2962ff;
     box-shadow: 0 1px 0 0 #82b1ff;
   }
    
   /* valid color */
   .input-field input[type=text].valid {
     border-bottom: 1px solid #2962ff;
     box-shadow: 0 1px 0 0 #82b1ff;
   }
     .input-field input[type=email].valid {
     border-bottom: 1px solid #2962ff;
     box-shadow: 0 1px 0 0 #82b1ff;
   }
     .input-field input[type=password].valid {
     border-bottom: 1px solid #2962ff;
     box-shadow: 0 1px 0 0 #82b1ff;
   }
     .input-field input[type=date].valid {
     border-bottom: 1px solid #2962ff;
     box-shadow: 0 1px 0 0 #82b1ff;
   }
       .input-field input[type=number].valid {
     border-bottom: 1px solid #2962ff;
     box-shadow: 0 1px 0 0 #82b1ff;
   }
     .input-field input[type=file].valid {
     border-bottom: 1px solid #2962ff;
     box-shadow: 0 1px 0 0 #82b1ff;
   }
   /* invalid color */
   .input-field input[type=text].invalid {
     border-bottom: 1px solid red;
     box-shadow: 0 1px 0 0 red;
   }
   /* icon prefix focus color */
   .input-field .prefix.active {
     color: #2962ff;
   }

</style>
<?php
}
?>