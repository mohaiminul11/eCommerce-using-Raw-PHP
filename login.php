<?php
ob_start();
include 'includes/head.php';
include 'includes/navigation.php';
include 'core/init.php';
include 'includes/leftBar.php';
?>
<div class="col-md-8">
   <h1>Login</h1>
  <form action="" method="post" id="form1" role="form">
	<table class="table">
  		<tr>
    		<td><label for="inputEmail" class="control-label col-xs-9">Username:</label></td>
    		<td><input  type="text" name="username" placeholder="username"></td>
  		</tr>
  		<tr>
    		<td><label for="inputEmail" class="control-label col-xs-9">Password:</label></td>
   			 <td><input type="password" name="password" placeholder="Password"></td>
   		</tr>
		<tr>
  			<td><input type=button onclick="location.href='registration.php'" class="btn btn-primary" value='Click here For Registration'></td>
  			<td><button type="submit" form="form1" name="submit" class="btn btn-success" value="Submit">Log In</button></td>
  		</tr>
	</table>
  </form>
  <?php
  if(isset($_GET['logout'])){
       $_SESSION["username"]='';
       $_SESSION['role']='';
       $_SESSION['name']='';
       $_SESSION['id']='';
    }

   if(isset($_POST['submit'])){
	$username =$_POST['username'];
	$password = $_POST['password'];
	$sql ="SELECT * FROM accounts WHERE  username ='$username' AND password ='$password'";
  $result = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($result)){
	while ($row = mysql_fetch_array($result)){
	  		$_SESSION["username"]=$row['username'];
            $_SESSION['role']=$row['role'];
            $_SESSION['name']=$row['name'];
            $_SESSION['id']=$row['id'];

	  		if ($_SESSION["role"]=="admin"){
				       	header( "Location: admin/index.php" );
				  }
			else if($_SESSION['role']=="user")
				  {
					   header( "Location: index.php" );
				  }else{
				      echo "<b style=\"color:red\">Login Failed!</b>";
				  }

				}

	        }



else {
	  	echo "<b style=\"color:red\">Login failed!</b>";
	  }
}
  ?>




</div>

<?php
    // include 'includes/rightSideBar.php';
    include 'includes/footer.php';
    ob_end_flush();
    ?>
