<?php require 'includes/core.inc.php';
require 'includes/connect.inc.php';
?>
<?php include_once 'includes/link.php';?>

<!--MAIN SECTION HERER -->


                <?php
                if(loggedin()){
                ?>
        <div class="row">
            <div class="col s12" style="padding-left:0;padding-right:0;" >
            <nav>
             <ul id="slide-out" class="side-nav">
      <li><a class="waves-effect waves-light" href="http://alumni.wbut.ac.in">HOME</a></li>
      <li><a class="waves-effect waves-light" href="aboutus.html">ABOUT US </a></li>
      <li><a class="waves-effect waves-light" href="forum.php">FORUM</a></li>
                  <li><a class="waves-effect waves-light" href="forgotpass.php">FORGOT PASSWORD</a></li>
      <li><a class="waves-effect waves-light" href="login_main.php">SIGN IN</a></li>
         <li><a class="waves-effect waves-light" href="update_password.php">UPDATE ACCOUNT</a></li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a  class="collapsible-header waves-effect waves-light">REGISTER<i class="mdi-navigation-arrow-drop-down"></i></a>
            <div class="collapsible-body">
              <ul>
                <li><a class="waves-effect waves-light" href="register.php">SIGN UP</a></li>
                  <li><a class="waves-effect waves-light" href="update_password.php">Update account</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="right hide-on-med-and-down">
     <li><a class="waves-effect waves-light" href="http://alumni.wbut.ac.in">HOME</a></li>
      <li><a class="waves-effect waves-light" href="aboutus.html">ABOUT US </a></li>
      <li><a class="waves-effect waves-light" href="forum.php">FORUM  </a></li>
        <li><a class="waves-effect waves-light" href="forgotpass.php">FORGOT PASSWORD</a></li>
      <li><a class="waves-effect waves-light" href="login_main.php">SIGN IN</a></li>
         <li><a class="waves-effect waves-light" href="update_password.php">UPDATE ACCOUNT</a></li>
      <li><a  class="dropdown-button waves-effect waves-light" href="#!" data-activates="dropdown1"><i class="mdi-navigation-arrow-drop-down right"></i></a></li>
      <ul id='dropdown1' class='dropdown-content'>
        <li><a class="waves-effect waves-light" href="register.php">SIGN UP</a></li>
        <li><a class="waves-effect waves-light" href="update_password.php">Update account</a></li>
<li><a class="waves-effect waves-light" href="includes/logout.php">Logout</a></li>
      </ul>
    </ul>
    <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="mdi-navigation-menu"></i></a>
        </nav>
    </div>
</div>
	<h4>SEARCH ALUMNI </h4>
	<form action="" method="POST">
		 <div class="row">
          <div class="input-field col s12 m6">
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
</div>
<center>
<button type="submit" class="btn waves-effect waves-light" style="background-color:#2962ff";>SERACH</button> 
</center>
</form>
<?php
	if(isset($_POST['department']) && isset($_POST['yearofpassing'])){
		$department =$_POST['department'];
		$yearofpassing = $_POST['yearofpassing'];
		
		if(!empty($department) && !empty($yearofpassing)){
				$query = "SELECT  `firstname` , `lastname` ,`yearofpassing`  ,  `department` FROM `users` WHERE `department` = '$department' AND `yearofpassing` = '$yearofpassing'";
				$query_run = mysql_query($query);
				while(($row = mysql_fetch_assoc($query_run))  !== false){
				echo '<p style="text-align:center; font-size:30px;color:#22baa0;" class="collection-item">' .' '.$row['firstname'].' '.$row['lastname'].'-    '.$row['department'].'  '.$row['yearofpassing'] .'</p>';
                    echo '<br>';
				}
			}else{
			echo 'FIELDS ARE EMPTY !!';
		}
	}

?>
<?php include_once 'includes/footer.php';?>
<?php include_once 'includes/sidelast.php';?>
<?php include_once 'includes/script.php';?>
<?php }else{
	echo '<h4> YOU ARE NOT LOGGED IN </h4>';
	echo '<center><a href="backup.html" class="btn waves-effect waves-light" style="background-color:#2962ff;">GO TO MAIN PAGE </a></center>';
	
}?>
