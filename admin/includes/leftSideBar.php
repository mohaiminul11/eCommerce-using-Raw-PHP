<!--Left Sidebar-->
<style media="screen">
 .sideNav{
   /*padding-right: 5px;*/
   /*border-right: 1px solid rgb(129, 12, 16);*/
 }
 .main_content{
   border-left: 1px solid rgba(120, 113, 113, 0.5);
 }
  .sideNav ul{
    list-style: none;
    padding-left: 5px;
  }

  .sideNav .menu li{
    /*width: 100%;*/

    border:2px solid rgba(4, 184, 190, 0);
    background-color: rgba(15, 17, 16, 0.74);
    border-radius: 5px;
    padding:5px;
    margin:5px auto;
    text-align: center;
  }

  .sideNav .menu li:hover{
    border:2px solid rgb(4, 184, 190);

  }

  .sideNav .menu li a{

     display: inline-block;

     width: 100%;
    color: white;
    text-decoration: none;
    font-weight: 600;
  }

</style>

       <div class="col-md-2">
           <div class="sideNav">
             <?php if(isset($_SESSION["username"])): ?>
             <div class="userinfo">
               <h4>Welcome <?=$_SESSION["username"];?></h4>
             </div>
           <?php endif; ?>
             <div class="menu">
               <ul>
                 <?php
                 if(isset($_SESSION["username"])&&$_SESSION["username"]!=NULL):
                   ?>
                 <li><a href="../login.php?logout=1">Logout</a></li>
                 <li><a href="Brands.php">Brands</a></li>
                 <li><a href="Category.php">Category</a></li>
                 <li><a href="Product.php">Add Product</a></li>
                 <li><a href="Report.php">Show Reports</a></li>
                 <?php
               else:
                 ?>
                 <li><a href="login.php">Login</a></li>
                 <?php
               endif;
                  ?>
               </ul>
             </div>
           </div>

 </div>
