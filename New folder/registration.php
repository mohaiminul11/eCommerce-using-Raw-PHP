<?php 
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/leftBar.php';
include 'core/init.php';
?>

<div class="col-md-8" >
	
	<script src="js/registrationvalid.js"></script>
	
  <h1>Registration Page</h1>
  <br />
  <br />
  
  <form action="" method="post"  onSubmit="return formValidation();">
  	<table class="table">
  		<tr>	
  			<td><label>User Name </label></td>&nbsp;<td><input type="text" name="username" id="username" maxlength="12" onblur="formValidation()"/></td>
  		<td><label style="color: red;" id="uerror"></label></td>
  		</tr>
  		
  		<tr>	
  			<td><label>Name </label></td>&nbsp;<td><input type="text" name="name" id="name" maxlength="20" onblur="formValidation()"/></td>
  		<td><label style="color: red;" id="errorun"></label></td>
  		</tr>
  		<tr>	
  			<td><label >Password </label></td>&nbsp;<td><input type="password" name="password" id="password" maxlength="12" onblur="formValidation()" /></td>
  		<td><label style="color: red;" id="error2"></label></td>
  		</tr>
  		
  		<tr>	
  			<td><label>Address </label></td>&nbsp;<td><input type="text" name="address" id="address" onblur="formValidation()" /></td>
  			<td><label style="color: red;" id="error3"></label></td>
  		</tr>
  		<tr>	
  			<td><label>Email </label></td>&nbsp;<td><input type="email" name="email" id="email" onblur="formValidation()"/></td>
  			<td><label style="color: red;" id="error4"></label></td>
  		</tr>
  		<tr>	
  			<td><label>Date of Birth  </label></td>&nbsp;<td><input type="datetime" name="dob" id="date" onblur="formValidation()"/></td>
  			<td><label style="color: red;" id="error5"></label></td>
  		</tr>
  		<tr>
  			<td><label id="gender">Sex:</label></li></td> 
       		<td> <input type="radio" name="gender" id="msex" value="male"> Male
  				<input type="radio" name="gender" id="fsex" value="female"> Female</td> 
  				
  		</tr>
  		<tr>
  			<td><input type="reset" class="btn btn-danger" value="Reset"></td>
  			<td><input type="submit" name="submit" class="btn btn-success"  value="submit"></td>
  			
  		</tr>
  	</table>
  
  </form>
  <?php
  if(isset($_POST['submit'])){
  	
  $sql="INSERT INTO accounts VALUES('','".$_REQUEST['username']."', '".$_REQUEST['name']."', '".$_REQUEST['password']."', '".$_REQUEST['address']."',
   '".$_REQUEST['email']."', '".$_REQUEST['dob']."','".$_REQUEST['gender']."','user')";
		
		
		$retval = mysql_query($sql)or die(mysql_error());
		if(!$retval){
			
            echo "<b style=\"color:red\">Data insertion Failed<b>";
			}
		else {
				echo "<b style=\"color:green\">Entered data successfully<b>";
					
			}
  }
  ?>
  
  
  
  
</div>

<?php 
    include 'includes/rightSideBar.php';
    include 'includes/footer.php';
?>