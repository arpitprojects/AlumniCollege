<?php include_once 'includes/connect.inc.php';?>
<?php include_once 'includes/core.inc.php';?>
<?php include_once 'includes/link.php';?>
<?php include_once 'includes/header.php';?>
<!-- main container-->

<center>
<?php 
  if(isset($_POST['department']) && isset($_POST['email']) && isset($_POST['yearofpassing'])){
      $department = $_POST['department'];
      $email = $_POST['email'];
      $yearofpassing = $_POST['yearofpassing'];
      if(!empty($department) && !empty($email) && !empty($yearofpassing)){
          $query = "SELECT `department` , `email` , `yearofpassing` FROM `users` WHERE `department` = '$department' AND `email`= '$email' AND `yearofpassing` = '$yearofpassing'";
          $query_run = mysql_query($query);
          if($mysql_num_rows = mysql_num_rows($query_run) == 0){
              echo '<h3>Things isn\'t matching</h3>';
          }else{
              $query = "SELECT `id` FROM `users` WHERE `department` = '$department' AND `email`= '$email' AND `yearofpassing` = '$yearofpassing'";
              $query_run  = mysql_query($query);
              $mysql_result = mysql_result($query_run  , 0);
                $_SESSION['id'] = $mysql_result;
              echo '<a style="background-color:#2962ff;" class="modal-trigger waves-effect waves-light btn" href="#modal1">Open to update</a>
';
             
          }
      }
  }

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

        if(isset($_POST['password']) && isset($_POST['cpassword'])){
            $password = test_input($_POST['password']);
            $cpassword = test_input($_POST['cpassword']);
            $password = md5($password);
            $cpassword = md5($cpassword);
            if(!empty($password) && !empty($cpassword)){
               if($password == $cpassword){
                   $query = "UPDATE `users` SET `password`  ='$password' WHERE `id` = '".$_SESSION['id']."'";
                   if($query_run =mysql_query($query)){
                       echo 'Sucessfully updated <br/>And you are logged in';
                       header('Location:login_main.php');
                   }else{
                       echo 'Something wrong with database !';
                   }
                   
               }else{
                   echo 'Password Doesn\'t match!';
               }
            }else{
                echo 'Feilds are not empty!';
            }
        }
      
      ?>
</center>
  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <form method="POST" enctype="multipart/form-data" action="forgotpass.php">
      <div class="modal-content">
     
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
    </div>
    <div class="modal-footer">
        <button type="submit"  class="btn modal-action modal-close waves-effect waves-green btn-flat ">SUBMIT</button>
    </div>
      </form>
  </div>
 <form action="forgotpass.php" method="POST"  enctype="multipart/form-data" onsubmit="return Validate(this);" >
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
        <option value="2025">2015</option>
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
 
     
    <div class="modal-footer">
        <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat" >SUBMIT</button>
    </div>
        </form>

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

<?php include_once 'includes/footer.php';?>
<?php include_once 'includes/sidelast.php';?>
<?php include_once 'includes/script.php';?>