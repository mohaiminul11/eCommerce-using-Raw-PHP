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
$query ="SELECT * FROM brand ORDER BY brand";
$result=mysql_query($query);

//Edit Brand
if(isset($_GET['edit'])&&!empty($_GET['edit'])){
    echo $_GET['edit'];
    $edit_id=$_GET['edit'];
    $sql="SELECT * FROM brand where id='".$_GET['edit']."'";
    $r=mysql_query($sql)or die(mysql_error());
    $row=mysql_fetch_array($r);
    if($r>0){
       //header("Location: Brands.php"); 
    }
    else{
        echo "Failed!";
    }
}

//Delete Brand
if(isset($_GET['delete'])&&!empty($_GET['delete'])){
    echo $_GET['delete'];
    $sql="DELETE FROM brand where id='".$_GET['delete']."'";
    $r=mysql_query($sql)or die(mysql_error());
    if($r>0){
       header("Location: Brands.php"); 
    }
    else{
        echo "Failed!";
    }
}

?>

<script> 
    /*
    function emptyCheck(){
        v=$("#brand").val();
        alert("valeu:"+v);
        
        if($("#brand").val().length==0){
            alert('Empty Field!');
            return false;
        }
        else{
            alert("IN else!");
            var test="";
            alert(test);
            }
            
        return true;
        
        
    }
    function myJavascriptFunction() { 
              var value = v;
              window.location.href = "myphpfile.php?name=" + javascriptVariable; 
            }
    
    function loadDoc() {
              alert(v);
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                 var vc = xhttp.responseText;
                 //alert("hello!");
                 alert(vc);
                 test=vc;
                 alert(test);
                 
                }
              };
              xhttp.open("GET", "BrandAvailability.php?val="+v, true);
              xhttp.send();


        }*/
</script>

<div class="container">
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
    <div class="col-md-8">
        <h2 class="text-center">Brands</h2><hr />
        
        <!--ADD/EDIT BRAND-->
        <form action="Brands.php<?=(isset($_GET['edit']))?'?edit='.$edit_id:''?>" method="post" class="form-inline">
          <div class="form-group">
              <?php 
                $brand_value="";
                if(isset($_GET['edit'])){
                    $brand_value=$row['brand'];
                }
                else if(isset($_POST['brand'])){
                    $brand_value=$_POST['brand'];
                }
              ?>
            <label for="Brand"><?php if(isset($_GET['edit'])){
                echo "Edit";
            }else{
                echo "Add A";
            }?> Brand</label>
            
            <input type="text" class="form-control" name="brand" id="brand" value="<?=$brand_value;?>">
          </div>
          <?php if(isset($_GET['edit'])): ?>
              <a href="brands.php" class="btn btn-default">Cancel</a>
          <?php endif; ?>
          <input type="submit" name="submit" value="<?=(isset($_GET['edit']))?'Edit':'Add '?> Brand" class="btn btn-large btn-success">
        </form><!--End of Form-->
        
        
        <!--Show Error Mesage-->
        <label><?php if(isset($_POST['submit'])){
            if($_POST['brand']==""){
                echo "Field is empty!";
            }else{
                $query="SELECT * FROM brand WHERE brand='".$_POST['brand']."'";
                if(isset($_GET['edit'])){
                    $query="SELECT * FROM brand WHERE brand='".$_POST['brand']."' AND id!='".$edit_id."'";
                }
                $r2 = mysql_query($query) OR DIE(mysql_error());
                $v=mysql_num_rows($r2);
                if($v>0){
                    echo "The Brand name already Exists!";
                }else{
                    $sql="INSERT into brand VALUES('','".$_POST['brand']."')";
                    
                    if(isset($_GET['edit'])){
                        $sql="UPDATE brand SET brand='".$_POST['brand']."' WHERE id='".$edit_id."'";
                    }
                    $res=mysql_query($sql)or die(mysql_error());
                    if($res>0){
                        header("Location: Brands.php");
                    }
                }
            }
            
            
        } ?></label>
        <hr />
        <!--EDIT AND DELETE-->
        <table class="table table-bordered table-striped">
            <thead>
                <th></th><th>Brand</th><th></th>
            </thead>
            <tbody>
                <?php while($row=mysql_fetch_array($result)): ?>
                    <tr>
                        <td><a href="brands.php?edit=<?=$row['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a></td>
                        <td><?=$row['brand'];?></td>
                        <td><a href="brands.php?delete=<?=$row['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-2"></div>
    
</div>

 <?php 
 include 'includes/footer.php';
 ?>