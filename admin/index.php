<?php
 if(!isset($_SESSION))
    {
        session_start();
    }
if($_SESSION['role']!="admin"){
        header("Location:../login.php");
    }
require_once'../core/init.php';
include 'includes/header.php';
include 'includes/navigation.php';

?>
<div class="col-md-2">
	<div class="container">
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?php
            if(isset($_SESSION["username"])){
                echo $_SESSION["username"];
            }else{
                echo "";
            }
            ?>
            <span class="caret"></span></button>
                <ul class="dropdown-menu">
                 <li><a href="../login.php?logout=1">Logout</a></li>

                </ul>
          </div>
</div>
    <div class="col-md-8">
<div class="center-block" style="max-width:400px" >
	<table class="table">
		<tr>

			<td><a href="Brands.php" class="btn btn-primary">Managing Brands</td>
		</tr>
		<tr>
			<td><a href="Category.php" class="btn btn-primary">Managing Category</td>
		</tr>
		<tr>
			<td><a href="Product.php" class="btn btn-primary">Add Product</td>
		</tr>
		<tr>
            <td><a href="Report.php" class="btn btn-primary">Show Reports</td>
        </tr>
	</table>


</div>
</div>


<div class="col-md-2"></div>
 <?php
 include 'includes/footer.php';
 ?>
