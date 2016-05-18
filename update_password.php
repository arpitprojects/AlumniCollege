<?php include_once 'includes/connect.inc.php'; ?>
<?php include_once 'includes/core.inc.php';?>

<?php include_once 'includes/link.php';?>
<?php include_once 'includes/header.php'?>
    
<?php if(!loggedin()){
     echo' <div class="container">';
    echo '<div class="row">';
    echo     '<div class="col s12 m6 offset-m3">';

    echo '<center>';
    echo '<i class="fa fa-frown-o"></i> YOU ARE NOT LOGGED IN ';
    echo '<br>';
    echo '<img src="img/makaut.png" class="materialized" height="300" height="300">';
    echo '<a href="login_main.php" class="btn waves-effect waves-light" style="background-color:#2962ff";>GO TO LOGIN PAGE! </a>';
    echo '</center>';
    echo '</div>';
     echo '</div>';
 echo '</div>';

}else{
    
?>
     <?php 
     // echo 'ok';
       if(isset($_POST['nepassword']) && isset($_POST['cnpassword']) && isset($_FILES['cimage']['tmp_name'])){
           if(!empty($_POST['nepassword']) && !empty($_POST['cnpassword']) && !empty($_FILES['cimage']['tmp_name']) ) {
            $nepassword = $_POST['nepassword'];
			$cnpassword = $_POST['cnpassword'];
            $cimage = $_FILES['cimage']['tmp_name'];
            $cimage_type =addslashes($_FILES['cimage']['type']);
            $cimage_name = addslashes($_FILES['cimage']['name']);
            $path = "register_image/".$cimage_name;
            $path1 = "register_image/";
            $query = "UPDATE `users` SET `securityques` ='$nepassword'  ,`image` = '$path' ,   `securityans` = '$cnpassword' WHERE `id` = '".$_SESSION['user_id']."' ";
            move_uploaded_file( $cimage , $path );
            if($query_run =mysql_query($query))	{
				echo '<center><h2>DONE</h2></CENTER>';
            }else{
				echo 'some problem with databse come back later!';
                }
            }else{
				   echo 'Fields are empty!!';
			   }
           }else{
           echo mysql_error();
       }
      ?>

    <form action="update_password.php" method="POST"  enctype="multipart/form-data" onsubmit="return Validate(this);" >
      <div class="row">
 <div class="input-field col s12 m6">
    <select name="nepassword"required>
      <option value="" disabled selected>Choose your option</option>
      <option value="What is your library card no?">What is your library card no?</option>
      <option value="What is pet name?">What is pet name?</option>
      <option value="What is your Fb username?">What is your Fb username?</option>
    </select>
    <label>Choose your security question!</label>
      </div>
          <div class="col s12 m6">
                 <div class="input-field">
                <input id="email" name="cnpassword" type="text" class="validate" required>
                <label for="email">Security Ans</label>
          </div>
      </div>
        </div>
            <div class="row">
        <div class="col s12 m6">
            <p>* optional stuff</p>
     <div class="file-field input-field">
      <div class="btn" style="background-color:#2962ff;">
        <span>Upload Your Picture:</span>
        <input type="file" name="cimage">
          
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
    </div>
</div>
    </div>
    <div class="modal-footer">
        <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat" >SUBMIT</button>
    </div>
        </form>

<?php } ?>
<?php include_once 'includes/sidelast.php'?>
<?php include_once 'includes/footer.php';?>
<?php include_once'includes/script.php'?>

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
