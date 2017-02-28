<!DOCTYPE html>
<html>
	<head>
		<title>Online Shop</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/main.css" />
		<meta name="viewport" content="width:device-width, initial-scale=1,user-scalable=no" />
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<!--Top Nav Bar-->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<a href="index.php" class="navbar-brand">Online shop</a>
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Men<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Shirts</a></li>
							<li><a href="#">Pants</a></li>
							<li><a href="#">Shoes</a></li>
							<li><a href="#">Accessories</a></li>
						</ul>
					</li>
				</ul>				
			</div>			
		</nav>
		
		<!--Header-->
		<div id="headerWrapper">
			<div id="back-flower"></div>
			<div id="logotext"></div>
			<div id="fore-flower"></div>
		</div>
	<div class="container-fluid">
	    <!--Left Sidebar-->
	    <div class="col-md-2"></div>
	    
	    <!--Main Content-->
	    <div class="col-md-8">
	        <div class="row">
	            <h2 class="text-center">Featured Products</h2>
	            <div class="col-md-3">
	                <h4>Levis Jeans</h4>
	                <img src="images/products/men4.png" alt="Levis Jeans" class="img-thumb" />
	                <p class="list-price text-danger">List Price: <s>$54.99</s></p>
	                <p class="price">Our Price:$19.99</p>
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
	            </div>
	            
	            <div class="col-md-3">
                    <h4>Womans Shirt</h4>
                    <img src="images/products/women7.png" alt="Womans Shirt" class="img-thumb" />
                    <p class="list-price text-danger">List Price: <s>$45.99</s></p>
                    <p class="price">Our Price:$99.99</p>
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
                </div>

	              
	            <div class="col-md-3">
                    <h4>Hollister Shirt</h4>
                    <img src="images/products/men1.png" alt="Hollister Shirt" class="img-thumb" />
                    <p class="list-price text-danger">List Price: <s>$34.99</s></p>
                    <p class="price">Our Price:$19.99</p>
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
                </div>
                
                <div class="col-md-3">
                    <h4>Fancy Shoes</h4>
                    <img src="images/products/women6.png" alt="Fancy Shoes" class="img-thumb" />
                    <p class="list-price text-danger">List Price: <s>$69.99</s></p>
                    <p class="price">Our Price:$49.99</p>
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
                </div>
                
                <div class="col-md-3">
                    <h4>Boys hoodie</h4>
                    <img src="images/products/boys1.png" alt="Boys hoodie" class="img-thumb" />
                    <p class="list-price text-danger">List Price: <s>$24.99</s></p>
                    <p class="price">Our Price:$18.99</p>
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
                </div>
                <div class="col-md-3">
                    <h4>Girls dress</h4>
                    <img src="images/products/girls3.png" alt="Girls dress" class="img-thumb" />
                    <p class="list-price text-danger">List Price: <s>$34.99</s></p>
                    <p class="price">Our Price:$24.99</p>
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
                </div>
                
                <div class="col-md-3">
                    <h4>Women's skirt</h4>
                    <img src="images/products/women3.png" alt="Women's skirt" class="img-thumb" />
                    <p class="list-price text-danger">List Price: <s>$29.99</s></p>
                    <p class="price">Our Price:$19.99</p>
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
                </div>
                <div class="col-md-3">
                    <h4>Purse</h4>
                    <img src="images/products/women5.png" alt="Purse"  class="img-thumb" />
                    <p class="list-price text-danger">List Price: <s>$49.99</s></p>
                    <p class="price">Our Price:$39.99</p>
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#details-1">Details</button>
                </div>
	        </div>
	    </div>
	    
	    <!--Right Sidebar-->
	    <div class="col-md-2"></div>
	</div>
	
	<footer class="text-center" id="footer">
	    &copy; Copyright 2013-2016 Online Shop.
	</footer>
	
	<!--Details Modal-->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#details-1">
  Launch demo modal
</button>

<div class="modal fade" id="details-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Levis Jeans</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="center-block">
                        <img src="images/products/men4.png" alt="Levis jeans" class="details img-responsive" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <h4>Details</h4>
                    <p>These jeans are amazing. They are straight leg, fit great and look sexy. Get a pair while they last!</p>
                    <hr>
                    <p>Price: $34.99</p>
                    <p>Brand:Levis</p>
                    <form action="add_cart.php" method="post">
                        <div class="form-group">
                            <div class="col-xs-4">
                                <label for="quality">Quantity:</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" />
                            </div>
                            
                               <p style="padding-left: 100px;">Available: 3</p> 
                            
                                
                        </div>
                        
                        <div class="form-group">
                            <br /><br />
                            <label for="size">Size:</label> 
                            <select name="size" id="size" class="form-control">
                                <option value=""></option>
                                <option value="28">28</option>
                                <option value="32">32</option>
                                <option value="36">36</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-shopping-cart"></span>Add To Cart</button>
      </div>
    </div>
  </div>
</div>        
		<script>
		    $(window).scroll(function() {
				var vscroll=$(this).scrollTop();
				$("#logotext").css({
				    "transform":"translate(0px, "+vscroll/2+"px)"
				});
				});
		</script>
	</body>
	
</html>