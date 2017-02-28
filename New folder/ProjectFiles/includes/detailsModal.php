    <!--Details Modal-->

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