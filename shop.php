<?php
	include_once(__DIR__ . "/config/database-con.php");
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />


		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Shop | Jenny's Store </title>
	</head>

	<body>
		<div id="cart-notification">
			Prodcut addedd successfully, <a href="./cart.php" target="_blank">View cart</a>
		</div>
		<!-- Start Header/Navigation -->
		<?php
			include_once(__DIR__ . "/components/header.php");
		?>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Shop</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">
					<?php
						$sqlQuery = "";

						if(isset($_GET['cat'])){
							$c_id = $_GET['cat'];
							$sqlQuery = "SELECT * FROM `products` WHERE c_id=$c_id";
						}else{
							$sqlQuery = "SELECT * FROM `products`";
						}
						$result = mysqli_query($connection, $sqlQuery);

						if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_assoc($result)){
								$pId = $row['p_id'];
								$pName = $row['p_name'];
								$pPrice = $row['p_price'];
								$pImage = $row['p_image'];
					?>
					<!-- Start Products -->
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<div class="product-item">
							<a href="./product.php?pId=<?php echo $pId?>">
								<img style="height:40vh;" src="uploads/<?php echo $pImage ?>" class="img-fluid product-thumbnail">
							</a>
							<h3 class="product-title"><?php echo $pName ?></h3>
							<strong class="product-price">$<?php echo $pPrice ?></strong>
							<span class="icon-cross">
								<button onclick="addCart(<?php echo $pId ?>)" title="Add to cart"><img src="images/cross.svg" class="img-fluid"></button>
							</span>
						</div>
					</div>
					<!-- End Products -->
					<?php
					 	}
					}

					 ?>
						

		      	</div>
		    </div>
		</div>


		<!-- Start Footer Section -->
		<?php include_once(__DIR__ . "/components/footer.php") ?>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>		
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
		<!-- Ajax Requests -->
		<script src="./js/ajax.js"></script>
	</body>

</html>
