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
$query ="SELECT * FROM categories ORDER BY id";
$result=mysql_query($query) or die(mysql_error());

//If edit button is  clicked then get all information for that id
if(isset($_GET['edit'])&&!empty($_GET['edit'])){
    echo $_GET['edit'];
    $edit_id=$_GET['edit'];
    $sql="SELECT * FROM categories where id='".$_GET['edit']."'";
    $r=mysql_query($sql)or die(mysql_error());
    $row=mysql_fetch_array($r);
    if($r>0){
       //header("Location: Brands.php");
    }
    else{
        echo "Failed!";
    }
}

//Delete Category
if(isset($_GET['delete'])&&!empty($_GET['delete'])){
    echo $_GET['delete'];
    $sql="DELETE FROM categories where id='".$_GET['delete']."'";
    $r=mysql_query($sql)or die(mysql_error());
    if($r>0){
       header("Location: Category.php");
    }
    else{
        echo "Failed!";
    }
}

?>


<div class="container">
    <?php
    include 'includes/leftSideBar.php';
     ?>
    <div class="col-md-8">
        <h2 class="text-center">Categories</h2><hr />
		<div>

		</div>
        <!--parent id = product_cat && Categoryid=$edit_id-->
        <!--ADD/EDIT Category Form-->
        <form action="Category.php<?=(isset($_GET['edit']))?'?edit2='.$edit_id:''?>" method="post" class="form-inline">
			<div class="form-group">

				<label>Parent Category:</label>

					<select name="product_cat" required>
						<option>Select a Catagory</option>
						<?php
							$get_cats="select category , id from categories ";

								$run_cats=mysql_query($get_cats);

								while($row_cats=mysql_fetch_array($run_cats)){

								$cat_id=$row_cats['id'];
								$cat_title=$row_cats['category'];


								echo"<option value='$cat_id'>$cat_title</option>";

		}

						?>

				</select>

			</div></br>

          <div class="form-group">

            <label for="Categories"> Categories: </label>

            <input type="text" class="form-control" name="category" id="category" value="<?php
                if(isset($_GET['edit'])){
                    echo $row['category'];
                }else if(isset($_GET['edit2'])){
                    echo $_POST['category'];
                }else{
                    echo "";
                }
            ?>">
          </div>
          <?php if(isset($_GET['edit'])): ?>
              <a href="Category.php" class="btn btn-default">Cancel</a>
          <?php endif; ?>
          <input type="submit" name="submit" value="<?=(isset($_GET['edit']))?'Edit':'Add '?> Categories" class="btn btn-large btn-success">
        </form><!--End of Form-->


        <!--parent id = product_cat && (for editing)Categoryid=$edit_id-->
        <!--Edit/Add/Error-->
        <label><?php
        if(isset($_POST['submit'])){

            if($_POST['product_cat']=="Select a Catagory"){
                $_POST['product_cat']=0;
            }

            if($_POST['category']==""){
                echo "Field is empty!";
            }else{
                $query="SELECT * FROM categories WHERE category='".$_POST['category']."' AND parent='".$_POST['product_cat']."'";
                $r2 = mysql_query($query) OR DIE(mysql_error());
                $v=mysql_num_rows($r2);
                if($v>0){
                    echo "The Category name already Exists!";
                }else{
                    //echo $_POST['product_cat'];



                    $sql="UPDATE categories SET category='".$_POST['category']."', parent='".$_POST['product_cat']."' WHERE id='".$_GET['edit2']."'";


                    if(!isset($_GET['edit2'])){
                        $sql="INSERT into categories VALUES('','".$_POST['category']."','".$_POST['product_cat']."')";
                    }
                    $res=mysql_query($sql)or die(mysql_error());
                    if($res>0){
                        header("Location: Category.php");
                    }
                }
            }


        } ?></label>
        <hr />
        <!--EDIT AND DELETE BUTTON CLICK AND SHOW ALL VALUES-->
        <table class="table table-bordered table-striped">
            <thead>
                <th></th><th>Category</th><th>Parent</th><th></th>
            </thead>
            <tbody>
                <?php while($row=mysql_fetch_array($result)): ?>
                    <tr>
                        <td><a href="Category.php?edit=<?=$row['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a></td>
                        <td><?=$row['category'];?></td>
						<td>
						<?php
						$queryy ="SELECT category FROM categories where id = '".$row['parent']."' ";
						$resultt=mysql_query($queryy) or die(mysql_error());

					echo "\x20\x20\x20";

                     while($roww=mysql_fetch_array($resultt))
                     {
                    ?>

						<?php

					echo $roww['category'];
						 }?></td>

                        <td><a href="Category.php?delete=<?=$row['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></span></a></td>


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
