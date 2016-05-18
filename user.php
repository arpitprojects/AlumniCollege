<?php require 'includes/core.inc.php';
require 'includes/connect.inc.php';
?>
<?php include_once 'includes/link.php';?>

<!--MAIN SECTION HERER -->


                <?php
                if(loggedin()){
                    
                
                $firstname = getuser('firstname');
                $lastname = getuser('lastname');
                $password = getuser('password');
                $yearofpassing = getuser('yearofpassing');
                $department = getuser('department');
                $registrationno = getuser('registrationno');
                $email = getuser('email');
                $securityques = getuser('securityques');
                $securityans = getuser('securityans');
                $mobileno = getuser('mobileno');
                $gender = getuser('gender');
                $status  = getuser('status');
                $image = getuser('image');
                ?>
<div class="row">
            <div class="col s12" style="padding-left:0;padding-right:0;" >
            <nav>
             <ul id="slide-out" class="side-nav">
      <li><a class="waves-effect waves-light" href="http://alumni.wbut.ac.in">HOME</a></li>
      <li><a class="waves-effect waves-light" href="aboutus.html">ABOUT US </a></li>
      <li><a class="waves-effect waves-light" href="forum.php">FORUM </a></li>
                  <li><a class="waves-effect waves-light" href="update_password.php">UPDATE ACCOUNT </a></li>
    <li><a class="waves-effect waves-light" href="forgotpass.php">FORGOT PASSWORD </a></li>
                 
      <li><a class="waves-effect waves-light" href="login_main.php">SIGN IN</a></li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a  class="collapsible-header waves-effect waves-light">REGISTER<i class="fa fa-sort-desc"></i></a>
            <div class="collapsible-body">
              <ul>
                <li><a class="waves-effect waves-light" href="register.php">SIGN UP</a></li>
                  <li><a class="waves-effect waves-light" href="update_password.php">Update account</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
                   <style>
                  #down{
                      margin-top:23%;
                  }
                        #left{
                  margin-left:25%;
              }
              </style>
    </ul>
    <ul class="right hide-on-med-and-down">
     <li><a class="waves-effect waves-light" href="http://alumni.wbut.ac.in">HOME</a></li>
      <li><a class="waves-effect waves-light" href="aboutus.html">ABOUT US </a></li>
      <li><a class="waves-effect waves-light" href="forum.php">FORUM </a></li>
        <li><a class="waves-effect waves-light" href="update_password.php">UPDATE ACCOUNT</a></li>
      <li><a class="waves-effect waves-light" href="includes/logout.php">LOGOUT</a></li>
        <li><a class="waves-effect waves-light" href="forgotpass.php">FORGOT PASSWORD</a></li>
      <li><a  class="dropdown-button waves-effect waves-light" href="#!" data-activates="dropdown1">Hi! <?php echo $firstname;
          ?><i id="down" class="fa fa-sort-desc right"></i></a></li>
      <ul id='dropdown1' class='dropdown-content'>
        <li><a class="waves-effect waves-light" href="register.php">SIGN UP</a></li>
        <li><a class="waves-effect waves-light" href="update_password.php">Update account</a></li>
<li><a class="waves-effect waves-light" href="includes/logout.php">Logout</a></li>
      </ul>
    </ul>
    <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i id="left" class="fa fa-bars"></i></a>
        </nav>
    </div>
</div>
<!-- main container stats-->
<?php
		if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
		$query = "SELECT `securityans` FROM `users` WHERE `id` = ".$_SESSION['user_id']."";
		$query_run = mysql_query($query);
		$mysql_results = mysql_result($query_run , 0);
		if($mysql_results == '0' || $mysql_results == '') {
			echo '<h4>WE HAVE UPDATED FEW FEILDS CLICK TO UPDATE YOUR FIELDS:</h4>';
			echo '<center><a href="update_password.php" style="background-color:#2962ff;" type="button" class="btn waves-effect waves-light">CLICK HERE</a></center>';
		}
	}
?>
<div class="row">
    <div class="col s12 m4">
        <div class="aside" style="background-color:;" style="padding-left:20% !important;">
            <img src="<?php echo $image;?>" class="img-circle" height="250" width="250" style="border-radius:50%; text-align:center;">
            <br>
            <h4 style="text-align:left;">Personal Details  :</h4>
            <br>
            <h1 style="text-align:;text-transform:capitalize; color:#22baa0 !important;"><?php echo $firstname ." ". $lastname;?></h1>
            <br>
            <div class="next_aside" style="background-color:white;padding:1%;">
                <p style="font-size:20px  !important;text-transform:capitalize;"><?php echo $department; ?></p>
                <br>
                 <p style="font-size:20px  !important;text-transform:capitalize;"><?php echo $registrationno; ?></p>
                <br>
                 <p style="font-size:20px  !important;"><?php echo $email; ?></p>
                <br>
                 <p style="font-size:20px  !important;text-transform:capitalize;"><?php echo $mobileno; ?></p>
                <br>
                 <p style="font-size:20px  !important;text-transform:capitalize;"><?php echo $yearofpassing; ?></p>
                <br>
                 <p style="font-size:20px  !important;text-transform:capitalize;"><?php echo $department; ?></p>
                <br>
                 <p style="font-size:20px  !important;text-transform:capitalize;"><?php echo $securityques; ?></p>
                <br>
                 <p style="font-size:20px  !important;text-transform:capitalize;"><?php echo $securityans; ?></p>
                <br>
                <p style="font-size:30px; color:#2962ff"><?php echo $status; ?> </p>
            </div>
        </div>
    </div>
    <br>
       
        
    <div class="col s12 m6 offset-m1">
            <nav style="padding-left:3%; padding-right:1%;">
                    
        <div class="nav-wrapper">
      <form action="" method="POST">
        <div class="input-field">
          <input class="" id="search"   name="search" type="search" required style="color:black !important;" onclick="Materialize.toast('Search Alumni', 3000)">
<div class="row">
    <div class="s12 m6 offset-m6" style="z-index:9999999999; width:96%;margin-left:2%;margin-top:-3.5%;">
      <div class="collection" style="color:black; list-style-type:none;cursor:pointe;z-index:99999999;">
        
      </div>
    
    </div>
    <br>
 </div>
          <label for="search"><i class="material-icons fa fa-search"> </i></label>
        </form><!--search form closed-->
          
    </div>
  </nav><br/>

    <br><br><br>
        </div>
         <div class="col s12 m6 offset-m1">
             <h5>SEARCH YOUR FRIENDS :
                <a href="advance_search.php" style="background-color:#2962ff;" class="btn waves-effect waves-light">CLICK HERE</a>
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Status</span>
              <p><?php echo $status; ?></p>
            </div>
            <div class="card-action">
              <a href="http://www.facebook.com">Go to FB</a>
              <a href="http://www.linkedin.com">Go to linkedin</a>
            </div>
          </div>
             
        </div>
      </div>
</div>
<style>
    .next_aside p{
        color:#22baa0; !important;
    }
</style>
    <div class="row" style="border:1px solid #2962ff;">
        <form action="user.php" method="POST">
        <div class="col s12 m8">
                <div class="input-field">
                
                    <label for="textarea1"></label>What's on your mind??</label>
                  <textarea name="text_area" id="textarea1" class="materialize-textarea"></textarea>
                    
                </div>
        </div>
        <button type="submit" href="" class="btn waves-light waves-effect" style="background-color:#2962ff;">Click and Update Status!</button>
    </form>
    </div>
</div>
<?php 
    if(isset($_POST['text_area'])){
        $text_area = $_POST['text_area'];
        if(!empty($text_area)){
            $query = "UPDATE `users` SET `status` = '$text_area'  WHERE `id` = '".$_SESSION['user_id']."'";
            if($query_run = mysql_query($query)){
                echo 'STATUS UPDATED REFRESH PAGE ';
                header('Location:user.php');
            }
        }else{
        echo 'NO MAN! DON\'T DO THIS!! ';
    }
}
?>
</div>
     <?php    
            }else{
   echo' <div class="container">';
    echo '<div class="row">';
    echo     '<div class="col s12 m6 offset-m3">';

    echo '<center>';
    echo '<i class="fa fa-frown-o"></i YOU ARE NOT LOGGED IN ';
    echo '<br>';
    echo '<img src="img/makaut.png" class="materialized" height="300" height="300">';
    echo '<a href="login_main.php" class="btn waves-effect waves-light" style="background-color:#2962ff";>GO TO LOGIN PAGe! </a>';
    echo '</center>';
    echo '</div>';
     echo '</div>';
     echo '</div>';
                    
        }
            
            
            ?>
<style>
    .timeline{
        background-image: url(img/en.jpg);
    }
    .input-field label {
     color: #2962ff;
   }
   /* label focus color */
   .input-field textarea:focus + label {
     color: #2962ff;
   }
   /* label underline focus color */
   .input-field textarea:focus {
     border-bottom: 1px solid #2962ff;
     box-shadow: 0 1px 0 0 #2962ff;
   }
   /* valid color */
   .input-field textarea.valid {
     border-bottom: 1px solid #2962ff;
     box-shadow: 0 1px 0 0 #2962ff;
   }
   /* invalid color */
   .input-field textarea.invalid {
     border-bottom: 1px solid red;
     box-shadow: 0 1px 0 0 red;
   }
   /* icon prefix focus color */
   .input-field .prefix.active {
     color: #2962ff;
   }
    #format{
        
        height:1100px;
    }
    .results li{
        list-style-type: none;
        padding:0 !important;
        
    }
</style>


<?php include_once 'includes/footer.php';?>
<?php include_once 'includes/sidelast.php';?>
<?php include_once 'includes/script.php';?>
