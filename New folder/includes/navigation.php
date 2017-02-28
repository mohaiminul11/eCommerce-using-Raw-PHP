<?php
    include 'core/init.php'; 
    $sql="SELECT * FROM categories WHERE parent=0";
    $result=mysql_query($sql) or die(mysql_error());
?>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <a href="index.php" class="navbar-brand">Online shop</a>
                <ul class="nav navbar-nav">
                    <?php 
                        if($result===FALSE){
                            die(mysql_error());
                        }
                        while($row=mysql_fetch_array($result)):
                            $parentid=$row['id'];
                            $sql2="SELECT * FROM categories WHERE parent='$parentid'";
                            $childs=mysql_query($sql2) or die(mysql_error());
                            
                     ?>      
                        
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $row['category']; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <?php 
                                while ($row=mysql_fetch_array($childs)):
                            ?>
                            <li><a href="index.php?edit=<?=$row['id'];?>&name=<?=$row['category'];?>"><?php echo $row['category']; ?></a></li>
                            <?php endwhile;?>
                        </ul>
                    </li>
                    
                    <?php
                        endwhile
                    ?>

                </ul>               
            </div>          
        </nav>
        <div class="container-fluid">