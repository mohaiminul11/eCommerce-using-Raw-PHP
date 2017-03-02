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
?>
        <?php
        include 'includes/leftSideBar.php';
         ?>

        <!--EDIT AND DELETE-->
        <div class="col-md-8">
            <h4>Add Product</h4>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td>
                            <label>Title:</label>
                        </td>
                        <td>
                            <input type="text" name="title" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Price:</label>
                        </td>
                        <td>
                            <input type="text" name="price" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Category:</label>
                        </td>
                        <td>
                            <select name="category">
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
                    </tr>

                    <tr>
                        <td>
                            <label>Brand:</label>
                        </td>
                        <td>
                            <select name="brand">
                                <?php
                                $get_cats="select brand , id from brand ";

                                $run_brand=mysql_query($get_cats);

                                while($row_cats=mysql_fetch_array($run_brand)){

                                $cat_id=$row_cats['id'];
                                $cat_title=$row_cats['brand'];


                                echo"<option value='$cat_id'>$cat_title</option>";
                                }
                                ?>

                            </select>
                    </tr>

                    <tr>
                        <td>
                            <label>Description:</label>
                        </td>
                        <td>
                            <input type="text" name="description" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>featured:</label>
                        </td>
                        <td>
                            <select name="featured">
                                <option value='1'>
                                    yes
                                </option>
                                <option value='0'>
                                    no
                                </option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>quantity:</label>
                        </td>
                        <td>
                            <input type="text" name="quantity" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Image:</label>
                        </td>
                        <td>
                            <input type="file" name="file" />
                        </td>
                    </tr>

                </tbody>
            </table>
            <input type="submit" name="submit" class="btn btn-success" value="Add product" />
        </form>

        <?php
           if(isset($_POST['submit'])){
                $name=$_FILES['file']['name'];
                $tempname=$_FILES['file']['tmp_name'];
                $location='../images/';
                move_uploaded_file($tempname, $location.$name);

                $sql="INSERT into products VALUES('','".$_POST['title']."','".$_POST['price']."','".$_POST['brand']."','".$_POST['category']."','"."images/".$name."','".$_POST['description']."','".$_POST['featured']."','".$_POST['quantity']."')";
                $result=mysql_query($sql);
                if($result>0){
                    echo "Successfully Added!";
                }else{
                    echo "Failed to Add";
                }
            }
        ?>
    </div>
    <div class="col-md-2"></div>

</div>

 <?php
 include 'includes/footer.php';
 ?>
