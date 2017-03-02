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
<?php
  include 'includes/leftSideBar.php';
 ?>
    <div class="col-md-8">

    </div>


<div class="col-md-2"></div>
 <?php
 include 'includes/footer.php';
 ?>
