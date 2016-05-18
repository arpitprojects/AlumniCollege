<?php require 'includes/core.inc.php';?>
<?php require 'includes/connect.inc.php';?>

<?php include 'includes/link.php'?>
<?php include 'includes/header.php';?>
    
<?php if(loggedin()){
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col s12 m6 offset-m3">';
    echo ' YOU ARE ALREADY LOGGED IN';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<a href="includes/logout.php" class="btn waves-effect waves-light" style="background-color:#2962ff";>YOU CAN LOGOUT HERE!! </a>';
    echo '<img src="img/makaut.png" style="text-align:center" class="circle materializeboxed" height="300" width="300"/>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}else {
?>
<?php 
	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;

}
    ?>
<?php
    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cpassword'])&& isset($_POST['registrationno']) && isset($_POST['mobileno'])&& isset($_POST['yearofpassing']) && isset($_POST['department']) && isset($_POST['securityques']) && isset($_POST['securityans']) && isset($_POST['gender'])){
    $firstname = test_input($_POST['firstname']);
    $lastname = test_input($_POST['lastname']);
    $email = test_input($_POST['email']);
    $pass  =stripslashes($_POST['password']);
    $password = md5($pass);
    $cpass = stripslashes($_POST['cpassword']);
    $cpassword = md5($cpass);
    $mobileno = $_POST['mobileno'];
    $registrationno = $_POST['registrationno'];
    $yearofpassing = $_POST['yearofpassing'];
    $securityques = $_POST['securityques'];
    $securityans = $_POST['securityans'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $image = $_FILES['image']['tmp_name'];
    $image_type =$_FILES['image']['type'];
    $image_name = $_FILES['image']['name'];
    $path = "register_image/".$image_name;
    $path1 = "register_image/";
    if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($cpassword) && !empty($mobileno) &&  !empty($registrationno) && !empty($yearofpassing) && !empty($securityques) && !empty($securityans) && !empty($gender) && !empty($department)){
    if($password = $cpassword){
        $query = "SELECT `email` FROM `users` WHERE `email` = '$email'";
        $query_run = mysql_query($query);
        if(mysql_num_rows($query_run) == 1){
            echo 'Hey buddy '. $email. ' alredy exits!';    
        }else{
        move_uploaded_file( $image , $path );
         $flag = 0;
         $sta = "No staus set Plz do one at bottom of this page";
            $query = "INSERT INTO `users` VALUES ('','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($lastname)."','".mysql_real_escape_string($password)."','$yearofpassing','$mobileno','$department','$securityques','".mysql_real_escape_string($securityans)."','$gender','$registrationno','".mysql_real_escape_string($email)."','$flag','$sta' , '$path')";
            if($query_run = mysql_query($query)){
                header('Location:login_main.php' );
            }else{
                echo 'Something wrong with our database COME LATER';
            }
        }
    }else{
        echo 'Password Doesnot matching !!';
    }   
    }else{
        echo 'ALL FEILDS ARE REQUIRED ....';
    }
}
?>

    <div class="container">
        <div class="row">
            <div class="col s12">
                <h3 class="align">REGISTER YOURSELF !!!</h3>
            </div>
        </div>
        <center>
            <form action="register.php" method="post" onsubmit="return Validate(this);"   enctype="multipart/form-data"><!--form starts -->
            <div class="row">
                <div class="col s12 m6">
            <div class="input-field">
            
            <input id="first_name2" name="firstname" type="text" class="validate" value="<?php if(isset($firstname)){echo $firstname;} ?>"required>
            <label class="active" for="first_name2">First Name</label>
        </div>
      </div>       
    <div class="input-field col s12 m6">
          <input id="lastname" type="text" name="lastname" class="validate"  value="<?php if(isset($lastname)){echo $lastname;} ?>"required>
        <label class="active" for="last_name">Last Name</label>
    </div>
    </div>
    <div class="row">
        <div class="col s12 m6">
            <div class="input-field">
          <input id="email" name="email" type="email" class="validate"  value="<?php if(isset($email)){echo $email;} ?>"required>
          <label for="email" class="active">Email</label>
        </div>
        </div>
         <div class="col s6">
        </div>
       
    </div>
            <br>
    <div class="row">
        <div class="col s12" style="text-align:left;">
             <label>GENDER</label>
			  <select  name="gender">
				<option value="" disabled selected>CHOOSE YOUR GENDER</option>
				<option value="male">MALE</option>
				<option value="female">FEMALE</option>
			  </select>

        </div>
    </div>
    <div class="row">
        <div class="col s12">
            
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
          <input id="password" type="password" name="password" class="validate"required>
          <label for="password">Password</label>
        </div>
      </div>
    <div class="row">
        <div class="input-field col s12 m6">
          <input id="password" type="password" name="cpassword" class="validate"required>
          <label for="password">Confirm Password</label>
        </div>
      </div>
    <div class="row">
        <div class="input-field col s12 m6">
          <input id="number" name="registrationno" maxlength="13" type="number" class="validate"  value="<?php if(isset($registrationno)){echo $registrationno;} ?>"required>
          <label for="">Registration No:</label>
        </div>
      </div>
             <div class="row">
        <div class="input-field col s12 m6">
          <input id="number" name="mobileno" type="number" maxlength="10" minlength="10" class="validate"  value="<?php if(isset($mobileno)){echo $mobileno;} ?>"required>
          <label for="">Mobile No:</label>
            <p>Max length is 10 avoid ,  +91 etc</p>
        </div>
      </div>
    <div class="row">
        <div class="col s12 m6">
            <p>* optional stuff</p>
     <div class="file-field input-field">
      <div class="btn" style="background-color:#2962ff;">
        <span>Upload Your Picture:</span>
        <input type="file" name="image">
          
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
    </div>
</div>
<div class="row">
    <div class="col s12 m6">
    <p style="text-align:left; color:#2962ff;" for="datpicker">Year Of Passing :</p>
      <select name="yearofpassing">
        <option value="1990">1990</option> 
        <option value="1991">1991</option> 
        <option value="1992">1992</option>
        <option value="1993">1993</option> 
        <option value="1994">1994</option> 
        <option value="1995">1995</option> 
        <option value="1996">1996</option> 
        <option value="1997">1997</option> 
        <option value="1998">1998</option> 
        <option value="1999">1999</option> 
        <option value="2000">2000</option> 
        <option value="2001">2001</option> 
        <option value="2002">2002</option> 
        <option value="2003">2003</option> 
        <option value="2004">2004</option> 
        <option value="2005">2005</option> 
        <option value="2006">2006</option>
        <option value="2007">2007</option> 
        <option value="2008">2008</option>
        <option value="2009">2009</option> 
        <option value="2010">2010</option> 
        <option value="2011">2011</option> 
        <option value="2012">2012</option> 
        <option value="2013">2013</option> 
        <option value="2014">2014</option> 
        <option value="2015">2015</option>
        <option value="2016">2016</option> 
        <option value="2017">2017</option>	
        <option value="2018">2018</option> 
        <option value="2019">2019</option> 
        <option value="2020">2020</option> 
        <option value="2021">2021</option> 
        <option value="2022">2022</option> 
        <option value="2023">2023</option> 
        <option value="2024">2024</option>
        <option value="2025">2025</option> 
        <option value="2026">2026</option>
    </select>
    </div>
 </div>
     <div class="row">
          <div class="input-field col s12">
    <select name="department"required>
      <option value="" disabled selected>Choose your option</option>
      <option value="B.Tech(CSE)">B.Tech(CSE)</option>
      <option value="B.Tech(IT)">B.Tech(IT)</option>
      <option value="M.Tech(CSE)">M.Tech(CSE)</option>
         <option value="M.Tech(SE)">M.Tech(SE)</option>
         <option value="M.Tech(IT)">M.Tech(IT)</option>
         <option value="M.Tech(VLSI)">M.Tech(VLSI)</option>
         <option value="M.Tech(IEM)">M.Tech(IEM)</option>
        <option value="M.Tech(Bioinformatics)">M.Tech(Bioinformatics)</option>
        <option value="Bio-Tech(M.Tech)">Bio-Tech(M.Tech)</option>
        <option value="Bio-Tech(Msc)">Bio-Tech(Msc)</option>
        <option value="Phd">Phd</option>
        <option value="Others">Others</option>
              </select>
    <label>Department</label>
  </div>
          
    </div>
    <br><br><br><br>
    <div class="row">
        <div class="input-field col s12">
    <select name="securityques"required>
      <option value="" disabled selected>Choose your option</option>
      <option value="What is your library card no?">What is your library card no?</option>
      <option value="What is pet name?">What is pet name?</option>
      <option value="What is your Fb username?">What is your Fb username?</option>
    </select>
    <label>Choose your security question!</label>
            <br>
  </div>
        <br><br><br><br><br>
            <div class="input-field">
            <input  type="text" name="securityans" class="validate"  value="<?php if(isset($securityans)){echo $securityans;} ?>"required>
        <label class="active" for="">Answer Your Question!</label> 
            </div>
        </div>
    
    <button type="submit" href="#" class="btn waves-effect waves-light" id="button" style="text-align:center;background-color:#2962ff;">JUST DO IT !!!</button> 
</form>
</div>
</center>
</div><!--container-->
</div>


<?php } ?>
<br><br><br>
<?php include 'includes/footer.php';?>
<?php include 'includes/script.php';?>
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
<script>
    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }
  
    return true;
}	
	
</script>
<script>
$(document).ready(function() {
    $('select').material_select();
});
</script>
<script>
$('#button').click( function() {

    if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        //get the file size and file type from file input field
        var fsize = $('#file')[0].files[0].size;
        
        if(fsize>20480) //do something vhjvif file size more than 1 mb (1048576)
        {
            alert(fsize +" bites\nToo big! Put less tha");
			
			return false;
        }
    }else{
        alert("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
    }
});


</script>