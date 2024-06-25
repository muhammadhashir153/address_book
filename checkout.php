<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Checkout | Jenny's Store </title>

		<style>
			td input:hover, td input:focus{
				outline:none;
				pointer-events: none;
			}
		</style>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<?php
			require_once(__DIR__ . "/config/database-con.php");
			include_once("./components/header.php");
		?>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Checkout</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<div class="untree_co-section">
		    <div class="container">
		      <form id="checkoutForm">
				<div class="row">
					<div class="col-md-6 mb-5 mb-md-0">
						<h2 class="h3 mb-3 text-black">Billing Details</h2>
						<?php
							if(session_status() == PHP_SESSION_NONE){
								session_start();
							}
							$uId = $_SESSION['u_id'];
							$sqlQuery = "SELECT * FROM `user_detail` WHERE u_id=$uId LIMIT 1";
							$result = mysqli_query($connection, $sqlQuery);

							if($result && mysqli_num_rows($result) > 0){
								$row = mysqli_fetch_assoc($result);
								$udName = $row['ud_name'];
								$udEmail = $row['ud_email'];
								$udAddress = $row['ud_adress'];
								$udWorkNum = $row['ud_work_num'];
								$udPersonalNum = $row['ud_phone_num'];
								$udDOB = $row['ud_dob'];
								$udRemarks = $row['ud_remarks'];
							}else {
								// Handle the case where no user detail is found
								$udName = $udEmail = $udAddress = $udWorkNum = $udPersonalNum = $udDOB = $udRemarks = '';
							}
						?>
						<div class="p-3 p-lg-5 border bg-white">
							<?php
								if($udName !== ""){
									echo "
										<div class='form-group'>
											<p>Your previous response is used in the form!</p>
										</div>
								";
								}
							?>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="ud_name" class="text-black">Full Name <span class="text-danger">*</span></label>
									<input value="<?php echo $udName ?>" required type="text" placeholder="Your Name" class="form-control" id="ud_name" name="ud_name">
								</div>
								<div class="col-md-6">
									<label for="ud_email" class="text-black">Your Email </label>
									<input value="<?php echo $udEmail ?>" required type="email" placeholder="Your Email" class="form-control" id="ud_email" name="ud_email">
								</div>
							</div>

							<div class="form-group row">
							<div class="col-md-12">
								<label for="ud_adress" class="text-black">Address <span class="text-danger">*</span></label>
								<textarea  required class="form-control" id="ud_adress" name="ud_adress" placeholder="Street address"><?php echo $udAddress ?></textarea>
							</div>
							</div>


							<div class="form-group row">
								<div class="col-md-6">
									<label for="ud_phone_num" class="text-black">Phone Number <span class="text-danger">*</span></label>
									<input value="<?php echo $udPersonalNum ?>" required type="tel" placeholder="Phone Number" class="form-control" id="ud_phone_num" name="ud_phone_num">
								</div>
								<div class="col-md-6">
									<label for="ud_work_num" class="text-black">Work Number <span class="text-danger">*</span></label>
									<input value="<?php echo $udWorkNum ?>" required type="tel" placeholder="Work Number" class="form-control" id="ud_work_num" name="ud_work_num">
								</div>
							</div>

							<div class="form-group row">
							<div class="col-sm-12">
								<label for="ud_dob" class="text-black">Your date of birth <span class="text-danger">*</span></label>
								<input value="<?php echo $udDOB ?>" required type="date" class="form-control" id="ud_dob" name="ud_dob">
							</div>
							</div>


							<div class="form-group">
							<label for="ud_remarks" class="text-black">Your Review <span class="text-danger">*</span></label>
							<textarea required name="ud_remarks" id="ud_remarks" cols="30" rows="5" class="form-control" placeholder="Write your review here..."><?php echo $udRemarks ?></textarea>
							</div>
							
						</div>
					</div>
					<div class="col-md-6">

					<div class="row mb-5">
						<div class="col-md-12">
						<h2 class="h3 mb-3 text-black">Your Order</h2>
						<div class="p-3 p-lg-5 border bg-white">
							<table class="table site-block-order-table mb-5">
							<thead>
								<th>Product</th>
								<th>Quantity</th>
								<th>Total</th>
							</thead>
							<tbody>
								<?php
									if(session_status() == PHP_SESSION_NONE){
										session_start();
									}

									$u_id = $_SESSION['u_id'];

									$sqlQuery = "SELECT * FROM cart INNER JOIN products WHERE products.p_id=cart.p_id AND cart.u_id=$u_id";
									$result = mysqli_query($connection, $sqlQuery);

									if(mysqli_num_rows($result) > 0){
										while($row = mysqli_fetch_assoc($result)){
											$cartId = $row['cr_id'];
											$pName = $row['p_name'];
											$pPrice = $row['p_price'];
											$pQuantity = $row['cr_quantity'];
											$pId = $row['p_id'];

								?>
								<tr>
									<td>
										<?php echo $pName ?>
										
										<input style="border:none; display:inline" type="hidden" value="<?php echo $pId ?>" name="product[]" id="">	
										<input style="border:none; display:inline" type="hidden" value="<?php echo $cartId ?>" name="cart[]" id="">	
										
									</td>
									<td>
										<input style="border:none; display:inline" type="readonly" value="<?php echo ($pQuantity !== NULL ? $pQuantity: 1) ?>" name="quantity[]" id="">
									</td>
								<td>$<span class="checkoutAmount"><?php echo $pPrice * ($pQuantity !== NULL ? $pQuantity: 1) ?></span></td>
								</tr>
								<?php
										}
									}
								?>
								<tr>
								<td colspan="2" class="text-black font-weight-bold"><strong>Order Total</strong></td>
								<td class="text-black font-weight-bold"><strong id="cartTotal">$350.00</strong></td>
								</tr>
							</tbody>
							</table>

							<div class="form-group">
								<input type="hidden" name="order" id="">
								<input type="hidden" name="u_id" value="<?php echo $_SESSION['u_id'] ?>" id="">
								<button class="btn btn-black btn-lg py-3 btn-block">Place Order</button>
							</div>

						</div>
						</div>
					</div>

					</div>
				</div>
			  </form>
		    </div>
		  </div>

		<!-- Start Footer Section -->
		<?php include_once(__DIR__ . "/components/footer.php") ?>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/ajax.js"></script>

		<script>
			totalAmount();
		</script>
	</body>

</html>
