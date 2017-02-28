<?php
session_start();
require_once'/../core/init.php';
$id=$_POST['id'];
$sql="SELECT * FROM products WHERE id='$id'";
$result=mysql_query($sql) or die(mysql_error());
$product=mysql_fetch_array($result);
$brand_id=$product['brand'];
$sql2="SELECT brand from brand WHERE id='$brand_id'";
$brand=mysql_query($sql2) or die(mysql_error());
$brandName=mysql_fetch_array($brand);


$test;

?>
<?php ob_start(); ?>

<div class="modal fade" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel"><?=$product['title'];?></h4>


        <?php
        // Check if any of the on hold items(session) expired

        $sql="SELECT * FROM products_onhold";
        $result2=mysql_query($sql) or die(mysql_error());
        if($result2){
          while ($row=mysql_fetch_array($result2)){
            // echo "<pre>";
            // print_r($row);
            if($row['sessionid']==session_id()){
              echo "Same session id";
              $start_date = new DateTime($row['datetime']);
              // $test=$start_date;
              // echo date("Y-m-d H:i:s");
              // echo $start_date;
              $quantity=$row['quantity'];
              $pid=$row['productid'];
              $onholdId=$row['id'];

              $since_start = $start_date->diff(new DateTime(date("Y-m-d H:i:s")));

              $minutes = $since_start->days * 24 * 60;
              $minutes += $since_start->h * 60;
              $minutes += $since_start->i;
              if($minutes>1){
                $sql="SELECT * FROM products WHERE id=$pid";
                $result=mysql_query($sql) or die(mysql_error());
                while ($row=mysql_fetch_array($result)){
                  $quantity+=$row['quantity'];
                }

                //
                echo "Quantity:".$quantity."<br>";
                $sql="UPDATE products SET quantity=$quantity WHERE id=$pid";
                $result=mysql_query($sql) or die(mysql_error());

                //Delete From products_onhold
                $sql="DELETE FROM products_onhold WHERE id=$onholdId";
                $result=mysql_query($sql) or die(mysql_error());

                // Delete from cart
                if(isset($_SESSION["cart"])){
                  foreach($_SESSION["cart"] as $subKey => $subArray ){
                        if($subArray['item_id'] == $pid){
                            //echo $subKey['item_id'];
                            //echo $_GET['delete'];
                             unset($_SESSION["cart"][$subKey]);
                        }
                   }
                }

              }
            }else{
              $pid=$row['productid'];
              $quantity=$row['quantity'];
              $start_date = new DateTime($row['datetime']);
              $since_start = $start_date->diff(new DateTime(date("Y-m-d H:i:s")));
              $minutes = $since_start->days * 24 * 60;
              $minutes += $since_start->h * 60;
              $minutes += $since_start->i;
              if($minutes>1){
                $sql="SELECT * FROM products WHERE id=$pid";
                $result=mysql_query($sql) or die(mysql_error());
                while ($row=mysql_fetch_array($result)){
                  $quantity+=$row['quantity'];
                }
                echo $quantity;
                $sql="UPDATE products SET quantity=$quantity WHERE id=$pid";
                $result=mysql_query($sql) or die(mysql_error());

                //Delete From products_onhold
                $sql="DELETE FROM products_onhold WHERE id='".$row['id']."'";
                $result=mysql_query($sql) or die(mysql_error());

                // Delete from cart
                if(isset($_SESSION["cart"])){
                  foreach($_SESSION["cart"] as $subKey => $subArray ){
                        if($subArray['item_id'] == $pid){
                            //echo $subKey['item_id'];
                            //echo $_GET['delete'];
                             unset($_SESSION["cart"][$subKey]);
                        }
                   }
                }
              }
            }
          }
        }


         ?>

      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="center-block">
                        <img src="<?=$product['image'];?>" alt="<?=$product['title'];?>" class="img-thumb img-responsive" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <h4>Details</h4>
                    <p><?=$product['description'];?></p>
                    <hr>
                    <p>Price: $<?=$product['price'];?></p>
                    <p>Brand:<?=$brandName['brand']?></p>


                    <!--Submit Form Validation-->

                    <script>
                        function validate(){
                            if(document.getElementById("quantity").value==""){
                                document.getElementById("errorMessage").innerHTML="Quantity field is empty!";

                                return false;
                            }
                            else if(document.getElementById("quantity").value<=0){
                                document.getElementById("errorMessage").innerHTML="Quantity Must be >0";
                                errorMessage
                                return false;
                            }

                            else if(document.getElementById("quantity").value > <?=$product['quantity']?>){
                                document.getElementById("errorMessage").innerHTML="Sorry not enough Product available!";
                                return false;
                            }
                            return true;
                        }
                    </script>

                    <!--Submit Form-->

                    <form onsubmit="return validate();" action="index.php?pid=<?=$id?>" method="post">
                        <div class="form-group">

                                <label for="quality">Quantity:</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" />
                                <label style="color:red;" id="errorMessage"></label>



                                <p style="color:green;">Available <?=$product['quantity']?></p>


                                <button type="submit" name="AddToCart" class="btn btn-warning"><span class="glyphicon glyphicon-shopping-cart"></span>Add To Cart</button>


                    </form>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<?php echo ob_get_clean(); ?>
