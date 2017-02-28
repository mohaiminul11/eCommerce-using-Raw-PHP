<?php
 if(!isset($_SESSION))
    {
        session_start();
    }
include 'core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/leftBar.php';

if(isset($_SESSION['role'])){
  if($_SESSION['role']!="user"){
          header("Location:login.php");
      }
}else{
  header("Location:login.php");
}

?>
<div class="col-md-8">
<?php
// $errorid=array();//more itmes than database

    function unsetArray($array){

        foreach($array as $subKey => $subArray ){
              if($subArray['item_id'] == $_GET['delete']){
                  //echo $subKey['item_id'];
                  //echo $_GET['delete'];
                   unset($array[$subKey]);
              }
         }
        return $array;
    }

if(isset($_GET['delete'])){
    $_SESSION['cart']=unsetArray($_SESSION['cart']);

    // we need add those products back to product table once we delete from cart
    $productTableQuantity=0;
    $sql="SELECT * from products where id='".$_GET['delete']."'";
    $res1=mysql_query($sql) or die(mysql_error);
    $row=mysql_fetch_array($res1);
    $productTableQuantity=$row['quantity'];

    // Quantity in products_onhold table
    $products_onholdTableQuantity=0;
    $sql="SELECT * from products_onhold where productid='".$_GET['delete']."' AND sessionid='".session_id()."'";
    $res1=mysql_query($sql) or die(mysql_error);
    $row=mysql_fetch_array($res1);
    $products_onholdTableQuantity=$row['quantity'];

    // Update quantity on products table
    $finalquantity=$productTableQuantity+$products_onholdTableQuantity;
    $productid=$_GET['delete'];
    $sql="UPDATE products SET quantity=$finalquantity WHERE id=$productid";
    // echo "QUERY:".$sql."<br>";
    mysql_query($sql) or die(mysql_error().bal());

    // Delete from products on hold table
    $sql="DELETE from products_onhold where productid='".$_GET['delete']."' AND sessionid='".session_id()."'";
    mysql_query($sql) or die(mysql_error);
    //header("location: Checkout.php");
}

//If user made the order**************************
if(isset($_GET['order'])&& isset($_GET['amount'])){
//     foreach ($_SESSION["cart"] as $each_item){
//         $sql3="SELECT * from products WHERE id='".$each_item['item_id']."'";
//         $res3=mysql_query($sql3) or die(mysql_error());
//         $fin=mysql_fetch_array($res3);
//         if($fin['id']==$each_item['item_id']){
//             $sQuantity=$each_item['quantity'];
//             $dbQuantity=$fin['quantity'];
//         }
//
//     if($sQuantity>$dbQuantity){
//         array_push($errorid,$fin['title']);
//     }
// }

// if(count($errorid)>0){
//     foreach ($errorid as $key => $value) {
//         echo "<b style='color:red;'>You have added more ".$value." than the Shop has!</b></br>";
//
//     }
// }
// else
  if($_GET['amount']>0){
       $id=0;
       if(isset($_SESSION['id'])){
           $id=$_SESSION['id'];
       }


       $sql="INSERT into orders VALUES('','".$_GET['amount']."','".date("Y-m-d")."','".$id."','','')";
        $result=mysql_query($sql) or die(mysql_error());
        //inserted into orders


        //insert into orderdetails


        $insertId=mysql_insert_id();
        foreach ($_SESSION["cart"] as $each_item){
            $sql="INSERT into orderdetails VALUES('','$insertId','".$each_item['item_id']."','".$each_item['quantity']."','".date("Y-m-d")."')";
            $result=mysql_query($sql) or die(mysql_error());

            // Delete from products_onhold
            // $prdid=$each_item['item_id'];
            // $sid=session_id();
            // $sql="DELETE FROM products_onhold WHERE productid=$prdid AND sessionid=$sid";
            // mysql_query($sql) or die(mysql_error().fuck());
            }
            $_SESSION['cart']=array();
        }
        else{
            echo "<b style='color:red;'>You have to select a product!</b></br>";
        }
     }

?>
        <table class="table table-bordered table-striped">
            <thead>
                <th>
                    Information
                </th>
                <th>
                    Delete
                </th>
            </thead>
            <tbody>
                <?php
                    $totalPrice=0;
                    if(isset($_SESSION["cart"])):
                foreach ($_SESSION["cart"] as $each_item):
                    $sql="SELECT * FROM products WHERE id='".$each_item['item_id']."'";
                    $result=mysql_query($sql);
                    $product=mysql_fetch_array($result);

                    $totalPrice+=$product['price']*$each_item['quantity'];

                    ?>

                   <tr>
                    <td>

                            <div class="row">
                                <div class="col-md-6">
                                    <img class="img-checkout img-responsive" src="<?=$product['image']?>" />
                                </div>

                                <div class="col-md-6 left-border">
                                    <p>Title: <?=$product['title']?></p>
                                    <p>Quantity: <?=$each_item['quantity']?></p>
                                    <p>Price: <?=$product['price']*$each_item['quantity'];?></p>
                                </div>
                            </div>

                    </td>
                    <td>
                          <center><a href="Checkout.php?delete=<?=$each_item['item_id'];?>" class="btn btn-danger">Delete</a></center>

                    </td>
                </tr>
                <?php
                endforeach;
                endif;
                ?>
            </tbody>
        </table>
        <hr>
        <div style="text-align: center; font-size: 20px;">Total Price: <?=$totalPrice ?></div>
        <!--Place Order-->
            <a href="Checkout.php?order=true&amount=<?=$totalPrice ?>" class="btn btn-primary" />Place Order</a></center>
    </div>
<?php
    include 'includes/rightSideBar.php';
    include 'includes/footer.php';
?>
