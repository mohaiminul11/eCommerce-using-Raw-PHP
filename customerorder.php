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
    max-width: 200px;
    border-radius: 5px;
    border:1px solid black;
    margin:1px;
  }
  .eachOrder{
    background-color: rgb(166, 138, 135);
    margin-bottom: 5px;
    border:1px solid green;
    border-radius: 5px;
    display: flex;
    align-items: center;
  }
  .eachOrder .col-md-8 .row{
    border-bottom: 2px solid white;
  }

  .eachOrder .col-md-8 .row:last-child{
    border-bottom: 0;
  }
  .eachOrder .col-md-8{
    background-color: rgb(129, 108, 106);
  }
  .eachOrder .col-md-8 .row{
    /*background-color: red;*/
    /*min-height: 200px;*/
    display: flex;
    align-items: center;
    text-align: center;
  }
  .eachOrder .col-md-2{
    font-size: 1.2em;
    color: white;
    font-weight: 600;
  }
  .eachOrder{
    margin-bottom: 5px;
    border:1px solid green;
  }
</style>

<div class="col-md-8">
  <?php while($row=mysql_fetch_array($result)): ?>

<div class="row eachOrder">
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
    <!-- <a href="" class="btn btn-danger">Delete</a> -->
    <p><?=$row['date']?></p>
    <p>Status:<?php if($row['delivered']==0){
      echo "Not yet Delivered.";
    }else{
      echo "Delivered.";
    } ?></p>
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
