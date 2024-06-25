<div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Image</th>
                          <th class="product-name">Product</th>
                          <th class="product-price">Price</th>
                          <th class="product-quantity">Quantity</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Remove</th>
                        </tr>
                      </thead>
                      <tbody>

						<?php 
								$sqlQuery =	"SELECT * FROM cart INNER JOIN products on products.p_id=cart.p_id WHERE cart.u_id=$uId";

								$result = mysqli_query($connection, $sqlQuery);

								if(mysqli_num_rows($result) > 0){
									while($row = mysqli_fetch_assoc($result)){
										$cartId = $row['cr_id'];
										$pName = $row['p_name'];
										$pImage = $row['p_image'];
										$pPrice = $row['p_price'];
										$pQuantity = $row['cr_quantity'];
								
						?>
                        <tr>
                          <td class="product-thumbnail">
                            <img src="uploads/<?php echo $pImage ?>" alt="Image" class="img-fluid">
                          </td>
                          <td class="product-name">	
                            <h2 class="h5 text-black"><?php echo $pName ?></h2>
                          </td>
                          <td>$<span class="price"><?php echo $pPrice ?></span></td>
                          	<td>
								<div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
								<div class="input-group-prepend">
									<button data-cart-id="<?php echo $cartId ?>" class="btn btn-outline-black decrease" type="button">&minus;</button>
								</div>
								<input type="text" class="form-control text-center quantity-amount" value="<?php $pQuantity !== null? print($pQuantity): print(1); ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
								<div class="input-group-append">
									<button data-cart-id="<?php echo $cartId ?>" class="btn btn-outline-black increase" type="button">&plus;</button>
								</div>
								</div>
			
							</td>
							<td>$ <span class="total"></span></td>
							<td>
									<button onclick="removeCart(event,<?php echo $cartId ?>)" class="btn btn-black btn-sm">X</button>
							</td>
            </tr>
						<?php
							}
						}else{
							echo "
								<tr>
									<td colspan='6'>
										Nothing to show? go to <a href='./shop.php'>shop</a> to add some products!❤️
                  </td>
                </tr>
							";
						}
						?>
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                    <div class="col-md-6">
                      <a href="./shop.php" class="btn btn-outline-black btn-sm btn-block">Continue Shopping</a>
                    </div>
                    <div class="col-md-6">
                      <button onclick="location.reload()" class="btn btn-outline-black btn-sm btn-block">Update Cart</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">$<span id="cartTotal"></span></strong>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-md-12">
                          <a class="btn btn-black btn-lg py-3 btn-block" href="checkout.php" target="_blank">Proceed To Checkout</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
		</div>