<?php include_once(__DIR__ . "/config/database-con.php") ?>
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
        <?php
            if(isset($_GET['pId'])){
                $pId = $_GET['pId'];

                $sqlQuery = "SELECT * FROM `products` INNER JOIN `categories` where products.p_id=$pId AND products.c_id=categories.c_id;";
                $result = mysqli_query($connection, $sqlQuery);

                if($result && mysqli_num_rows($result)){
                    $row = mysqli_fetch_assoc($result);

                    $pName = $row['p_name'];
                    $pImage = $row['p_image'];
                    $pDesc = $row['p_desc'];
                    $pStock = $row['p_stock'];
                    $pPrice = $row['p_price'];
                    $catName = $row['c_name'];
                    $cId = $row['c_id'];
                    

                }
            }
        ?>
		<title><?php echo $pName ?></title>
	</head>

	<body>
        <div id="cart-notification">
			Prodcut addedd successfully, <a href="./cart.php" target="_blank">View cart</a>
		</div>

		<!-- Start Header/Navigation -->
		<?php include_once(__DIR__ . "/components/header.php") ?>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="product-img-box">
                                <img src="./uploads/<?php echo $pImage ?>" alt="">
                            </div>
						</div>
						<div class="col-lg-7 my-auto">
							<div class="product-content">
                                <h5 class="text-white"> Category: <a target="_blank" href="./shop.php?cat=<?php echo $cId ?>"><?php echo $catName ?></a></h5>
                                <h1><?php echo $pName ?></h1>
                                <h3 class="text-white">$<?php echo $pPrice ?></h3>
                                <p>
                                    <?php echo $pDesc ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p>
                                        <button onclick="buyNow(<?php echo $pId ?>)" class="btn btn-secondary me-2">Buy Now</button>
                                        <button onclick="addCart(<?php echo $pId ?>)" class="btn btn-white-outline" type="submit">Add to Cart</button>

                                    </p>

                                    <p >In Stock: <b><?php echo $pStock ?></b></p>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		

		<!-- Start Footer Section -->
		<?php include_once(__DIR__ . "/components/footer.php") ?>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/ajax.js"></script>


	</body>

</html>
