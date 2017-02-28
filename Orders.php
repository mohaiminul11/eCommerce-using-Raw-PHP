<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
if($_SESSION['role']!="user"){
        header("Location:../login.php");
    } 
include 'core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/leftBar.php';
    
    
    $sql="SELECT * FROM orders WHERE customerid='".$_SESSION['id']."'";
    
    $result=mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_array($result)){
		
		
		


?>
<div class="col-md-8">
	        <div class="row">
	<?=$row['orderId']?>
</div>
</div>

<?php }?>
	



 <?php 
    
    include 'includes/rightSideBar.php';
    include 'includes/footer.php';
?>