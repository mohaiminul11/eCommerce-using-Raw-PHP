<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
if($_SESSION['role']!="admin"){
        header("Location:../login.php");
    } 
include '../core/init.php';
include 'includes/header.php';
include 'includes/navigation.php';
$query ="SELECT * FROM brand ORDER BY brand";
$result=mysql_query($query);

//Edit Brand
?>
        <div class="col-md-2">
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
        
        <!--EDIT AND DELETE-->
        <div class="col-md-8">
            <?php
                $sql="SELECT productId, SUM(quantity) AS total , date from orderdetails WHERE date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE() GROUP BY productId  LIMIT 5 ";
                $res=mysql_query($sql)or die(mysql_error());
                
            ?>
            
            <table class="table">
                <thead>
                    <td>Image</td>
                    <td>Description</td>
                </thead>
                <?php
                if($res>0):
                while($row=mysql_fetch_array($res)):
                 
                    //echo $row['productId'];
                    $quantity=$row['total'];
                    $query="SELECT * from products where id=".$row['productId'];
                    $result=mysql_query($query);
                if($result>0):
                while($row=mysql_fetch_array($result)):?>
                <tbody>
                    <tr>
                        <td>
                            <img src="../<?=$row['image']?>" class="img-thumb img-responsive"/>
                        </td>
                        <td>
                            <label>Name: <?=$row['title']?></label><br>
                            <label>Quantity Sold: <?=$quantity?></label>
                        </td>
                    </tr>
                    <?php endwhile;
                      endif;
                      endwhile;
                        endif;
                     ?>
                </tbody>
                
            </table>
            
            
        </div>


 <div class="col-md-2"></div>
    
</div>

 <?php 
 include 'includes/footer.php';
 ?>