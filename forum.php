<?php
    include_once 'includes/connect.inc.php';
    include_once 'includes/core.inc.php';
?>

<!DOCTYPE html>
<html>
    <title>
        FORUM
    </title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <!-- Compiled and minified CSS -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
          <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/materialize.min.css"> 
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/main.css" type="text/css"/>
    <style>
        nav{
            position: fixed;
            top:0;
            z-index:99999999999999999999;
        }
        header{
          
            height:500px;
          
          
           
        }
        aside{
            width:auto;
            background-color:;
            height:200px;
        }
        textarea{
            height:100px;
            font-size:35px;
        }
        .message{
            height:100px;
       
            background-color: #efefef;
            box-shadow: 4px 4px 4px grey;
            width:400px;
            position: relative;
            top:10%;
            border-radius:100px;
        }
        .pimg{
            position:relative;
            left:-44%;
            top:10%;
            border-radius: 50%;
        }
        .ptext{
            position:relative;
            top:-55%;
            width:250px;
            
        }
        .blocke{
            font-family: myfirstfont;
        }
        #return-to-top {
    position: fixed;
    bottom: 20px;
    left: 20px;
    background: #22baa0;
    background: #22baa0;
    width: 50px;
    height: 50px;
    display: block;
    text-decoration: none;
    -webkit-border-radius: 35px;
    -moz-border-radius: 35px;
    border-radius: 35px;
    display: none;
    -webkit-transition: all 0.3s linear;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
#return-to-top i {
    color: #fff;
    margin: 0;
    position: relative;
    left: 16px;
    top: 13px;
    font-size: 19px;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
#return-to-top:hover {
    background: #2962ff;
}
#return-to-top:hover i {
    color: #fff;
    top: 5px;
}

    </style>
    <body>
    <?php 
        if(loggedin()){
            include_once 'includes/header.php';
            $name = getuser('firstname');
            $image = getuser('image');
            $user_id = getuser('id');
            ?>
        <!--write your HTML here-->
        <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
        <br></br><br>
        <h1 style="text-align:center;">FORUM</h1>
        <h4 style="text-align:center;color:#22baa0;"> Post about job internships and other details and help your junior!!</h4>
        <br><br><br>
        <div class="container">
            <div class="row">
                <div class="col s12 m3">
                    <?php
                        $query = "SELECT COUNT(*) FROM `users`" ;
                        $query_run = mysql_query($query);
                        $mysql_result = mysql_result($query_run , 0); 
                    ?>
       
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Total User:<br/> </span>
               
              <p><?php echo '<p style="color:#22baa0;font-size:25px;">'.$mysql_result.'</p>'; ?></p>
            </div>
            <div class="card-action">
            </div>
          </div>
                </div>
                 <div class="col s12 m3">
                    <?php
                        $query = "SELECT COUNT(*) FROM `users` WHERE `securityques`= 0" ;
                        $query_run = mysql_query($query);
                        $mysql_result = mysql_result($query_run , 0); 
                    ?>
       
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">New User: </span>
              <p><?php echo '<p style="color:#22baa0;font-size:25px;">'.$mysql_result.'</p>'; ?></p>
            </div>
            <div class="card-action">
            </div>
          </div>
                </div>
                 <div class="col s12 m3">
                    <?php
                        $query = "SELECT COUNT(*) FROM `users` WHERE `valid` = 1" ;
                        $query_run = mysql_query($query);
                        $mysql_result = mysql_result($query_run , 0); 
                    ?>
       
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Registered User: </span>
              <p><?php echo '<p style="color:#22baa0;font-size:25px;">'.$mysql_result.'</p>'; ?></p>
            </div>
            <div class="card-action">
            </div>
          </div>
                </div>
                 <div class="col s12 m3">
                    <?php
                        $query = "SELECT COUNT(*) FROM `users` WHERE `valid`= 0" ;
                        $query_run = mysql_query($query);
                        $mysql_result = mysql_result($query_run , 0); 
                    ?>
       
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title"> Non-Verified:</span>
              <p><?php echo '<p style="color:#22baa0;font-size:25px;">'.$mysql_result.'</p>'; ?></p>
            </div>
            <div class="card-action">
            </div>
          </div>
                </div>
            </div>
        </div>
        
        <center>
          <div class="container">
        <div class="row">
            <div class="col s12 m12">

        <form action="forum.php" method="POST">
             <div class="row">
   
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" name="message" class="materialize-textarea" required></textarea>
          <label for="textarea1" style="color:#2962ff;font-size:20px;">Write Post:</label>
        </div>
      </div>
    
  </div>
        
            <button id="but" type="submit" class="btn waves-light waves-effect" style="background-color:#2962ff;" >SUBMIT</button>
        </form>
                            </div>
            </div>
        </div>
        </center>
        <script>
          
        </script>
        <div class="container">
        <div class="row">
            <div class="col s10 m12">
        <header>
            <?php
                	function get_msg(){		//get msg function
		$query = "SELECT *  FROM `forum`  ORDER BY `id` DESC";
		$run = mysql_query($query);
		$messages = array();
		
		while($message = mysql_fetch_assoc($run)){
			$messages[]  =array('name' =>$message['name'],'image' => $message['image'], 'date' => $message['date'],
						'message' => $message['message']);
		}
		
		return $messages;
		
	}
 $messages = get_msg();
		foreach($messages as $message){
        
              echo '<div class="col s12 m8 offset-m2 l10 offset-l1">';
      echo '  <div class="card-panel grey lighten-5 z-depth-1">';
       echo '   <div class="row valign-wrapper">';
          echo '  <div class="col s2">';
          echo '    <img src="'.$message['image'].'" alt="" class="circle responsive-img"> ';
        echo '    </div>';
          echo '  <div class="col s10">';
            echo '  <span class="black-text">';
            echo '<p style="font-size:20px;color:white;background-color:#22baa0;padding:1%;">'.$message['name'].'-->   '.$message['date'].'</p>';
            echo '<br>';
            echo $message['message'];
            echo '  </span>';
          echo '  </div>';
          echo '</div>';
       echo ' </div>';
      echo '</div>';
    echo '<br>';   
		}      
            ?>
            </div>
            </div>
            </div>
        <?php 
	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;

}
    ?>
            <?php
                if(isset($_POST['message'])){
                    $date = date("Y-m-d h:i:sa");
                    $message = test_input($_POST['message']);
                    if(!empty($message)){
                        $query = "INSERT INTO `forum` VALUES('' , '".mysql_real_escape_string($message)."' , '".mysql_real_escape_string($user_id)."' ,'".mysql_real_escape_string($name)."' , '".mysql_real_escape_string($image)."' , '".mysql_real_escape_string($date)."')";
                        $query_run = mysql_query($query);
                        header('Location:forum.php');
                        
                    }else{
                        echo 'Message should  not be empty!!!';
                    }
                }
            
            ?>
        </header>
     
        <br><br><br><br><br>
     
        <?php 
       
        include_once 'includes/sidelast.php';
        }else{
          include_once 'includes/header.php';
             echo '<center>';
    echo 'MAKAUT SAYS : YOU ARE <strong> NOT</strong>  LOGGED IN ';
    echo '<br>';
       echo '<a href="login_main.php" class="btn waves-effect waves-light" style="background-color:#2962ff";>YOU CAN LOGIN HERE!! </a>';
    echo '<br>';
            ?>
       <div class="row">
    <center>
    <div class="col m6 s12 offset-m3">
<img src="img/makaut.png" style="text-align:center" class="circle materializeboxed" height="300" width="300"/>
    </div>
    </center> 
</div>
<br><br><br><br><br></br>
<?php
        include_once 'includes/footer.php';
        include_once 'includes/sidelast.php';
        include_once 'includes/sidelast.php';
        }    
        
    ?>
    
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
        <script src="js/materialize.min.js" type="text/javascript"></script>
        <script src="js/slider.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script>
        // ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});

    </script>

    </body>
</html>