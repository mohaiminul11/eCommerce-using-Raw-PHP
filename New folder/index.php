<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
if($_SESSION['role']!="user"){
        header("Location:login.php");
    } 
include 'core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/leftBar.php';
    
    
    $sql="SELECT * FROM products WHERE featured=1";
    if(isset($_GET['edit'])&&!empty($_GET['edit'])&&isset($_GET['name'])&&!empty($_GET['name'])){
        $sql="SELECT * FROM products WHERE categories='".$_GET['edit']."'";
    }
    $result=mysql_query($sql) or die(mysql_error());

?>
		
		
		
	   
	    
	    <!--Main Content-->
	    <div class="col-md-8">
	        <div class="row">
	            <h2 class="text-center"><?=(isset($_GET['name']))?$_GET["name"]:'Featured Products'?></h2>
	            <?php 
	               while ($row=mysql_fetch_array($result)):
	            ?>
    	            <div class="col-md-3">
    	                <h4><?= $row['title']; ?></h4>
    	                <img src="<?= $row['image']; ?>" alt="<?= $row['title']; ?>" class="img-thumb img-responsive" />
    	                <!--<p class="list-price text-danger">List Price: <s>$54.99</s></p>-->
	                    <p class="price"><b>Price: </b><?= $row['price']; ?></p>
                        <button type="button" class="btn btn-sm btn-success" onclick="detailsModal(<?=$row['id']?>);">Details</button>
    	            </div>
	            <?php 
	               endwhile;
	            ?>
	        </div>
<?php
    if(isset($_POST['AddToCart'])){
        $quantity=$_POST['quantity'];
        $pid = $_GET['pid'];
        $wasFound = false;
        $i=0;
        
        if (!isset($_SESSION["cart"]) || count($_SESSION["cart"]) < 1){
            $_SESSION["cart"] = array(0 => array("item_id" => $pid, "quantity" => $quantity));
            //echo "quantity<1";
        }
        else{
            foreach ($_SESSION["cart"] as $each_item){
                $i++;
                foreach($each_item as $x => $x_value) {
                    if ($x == "item_id" && $x_value == $pid) {
                        
                    array_splice($_SESSION["cart"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + $quantity)));
                    $wasFound = true;
                    }
                }
            }
            if ($wasFound == false) {
                   //echo "was not Found!";
                   array_push($_SESSION["cart"], array("item_id" => $pid, "quantity" => $quantity));
            }
                   
        }
        //header("location: cart.php");
            
        }
        
?>
	    </div>

	    

    <?php 
    
    include 'includes/rightSideBar.php';
    include 'includes/footer.php';
?>