<?php
 if(!isset($_SESSION))
    {
        session_start();
    }

include 'core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/leftBar.php';
$cusid=$_SESSION['id'];
$sql="SELECT * FROM orders WHERE customerid=$cusid AND delivered=0";
$result=mysql_query($sql) or die(mysql_error());
?>
<!-- Main Content -->

<style media="screen">
  img{
    max-height: 200px;
  }
</style>

<div class="col-md-8">
  <?php while($row=mysql_fetch_array($result)): ?>

<div class="row">
  <div class="col-md-2">
    <p><?="orderid:".$row['orderId']?></p>
  </div>
  <div class="col-md-8">
    <?php
      $sql="SELECT * FROM orderdetails where orderId='".$row['orderId']."'";
      $result2=mysql_query($sql) or die(mysql_error());
      while($row2=mysql_fetch_array($result2)):
     ?>
    <div class="row">
      <div class="col-xs-8">
        <?php
          $sql="SELECT * FROM products WHERE id='".$row2['productId']."'";
          $result3=mysql_query($sql) or die(mysql_query());
          $row3=mysql_fetch_array($result3);
         ?>
        <img src="<?=$row3['image']?>" class="img img-responsive" alt="<?=$row3['title']?>">
      </div>
      <div class="col-xs-4">
        <?=$row2['quantity']?>
      </div>
    </div>
  <?php endwhile; ?>
  </div>
  <div class="col-md-2">
    <a href="" class="btn btn-danger">Delete</a>
  </div>

</div>
<?php endwhile; ?>
</div>

<?php

include 'includes/rightSideBar.php';
?>
</div>
<?php
include 'includes/footer.php';
?>
