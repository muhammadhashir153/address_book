<?php
	require_once(__DIR__ . "/config/database-con.php");
	require_once(__DIR__ . "/config/validations.php");
?>
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
		<title>Welcome to Jenny's Beauty and Bling</title>
	</head>

	<body>
		<div id="cart-notification"></div>

		<!-- Start Header/Navigation -->
		<?php
			include_once("./components/header.php");
		?>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Welcome to Jenny's<span clsas="d-block"> Beauty and Bling</span></h1>
								<p class="mb-4">Welcome to Jenny's Beauty and Bling, where beauty meets elegance. We are delighted to offer you an exquisite range of cosmetics and stunning imitation jewelry, all from the comfort of your home.</p>
								<p><a href="./shop.php" class="btn btn-secondary me-2">Shop Now</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="images/pngwing.com (1).png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Product Section -->
		<div class="product-section">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title">One-Stop Shop for Cosmetics and Imitation Jewelry.</h2>
						<p class="mb-4">Explore our diverse collection of high-quality products designed to enhance your beauty and complement your style.</p>
						<p><a href="./shop.php" class="btn">Explore</a></p>
					</div> 
					<!-- End Column 1 -->

					<!-- Start Column 2 -->
					<?php
						$sqlQuery = "SELECT * FROM `products` INNER JOIN categories ON products.c_id=categories.c_id ORDER BY RAND() LIMIT 3";

						$result = mysqli_query($connection, $sqlQuery);

						if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_assoc($result)){
								$pId = $row['p_id'];
								$pName = $row['p_name'];
								$pPrice = $row['p_price'];
								$pImage = $row['p_image'];

					?>
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

					<?php
							}
						}
					?>
					<!-- End Column 2 -->


				</div>
			</div>
		</div>
		<!-- End Product Section -->

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Why Choose Us</h2>
						<p>At Jenny's Beauty and Bling, we believe in providing an exceptional shopping experience that goes beyond just selling products. Here’s why our customers love us and why you should choose us for all your cosmetic and imitation jewelry needs:</p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<i style="font-size:30px; color:#000;" class="fa-regular fa-star"></i>
									</div>
									<h3>Exceptional Quality</h3>
									<p>We handpick every product in our collection to ensure it meets our high standards of quality. </p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<i style="font-size:30px; color:#000;"  class="fa-solid fa-ruler-combined"></i>
									</div>
									<h3>Expert Craftsmanship</h3>
									<p>Our skilled artisans and beauty experts bring years of experience and passion to every piece of jewelry and cosmetic product.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<i style="font-size:30px; color:#000;" class="fa-solid fa-user-shield"></i>
									</div>
									<h3>Ethical Practices</h3>
									<p>Our diamonds and gemstones are conflict-free, and our beauty products are cruelty-free and environmentally friendly.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<i style="font-size:30px; color:#000;" class="fa-regular fa-face-smile-beam"></i>
									</div>
									<h3>Customer Satisfaction</h3>
									<p>Our hassle-free return policy ensures your complete satisfaction with every purchase.</p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="images/element5-digital-ooPx1bxmTc4-unsplash.jpg" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

		<!-- Start We Help Section -->
		<div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="images/cornelia-ng-2zHQhfEpisc-unsplash.jpg" alt="Untree.co"></div>
							<div class="grid grid-2"><img src="images/neauthy-skincare-STvxHZpRNGY-unsplash.jpg" alt="Untree.co"></div>
							<div class="grid grid-3"><img src="images/shubhi-verma-3kMQKVsfd80-unsplash.jpg" alt="Untree.co"></div>
						</div>
					</div>
					<div class="col-lg-5 ps-lg-5">
						<h2 class="section-title mb-4">Our Categories</h2>
						<p>Explore our Beauty Tips & Tricks section for expert advice on skincare, makeup mastery, hair care tips, fragrance dos and don'ts, and essential body care routines to enhance your beauty regimen.</p>


						<div class="row justify-content-center">
							<div class="col-lg-12">
								<div class="testimonial-slider-wrap text-center">

									<div id="categories-nav">
										<span class="prev" data-controls="prev"><i class="fa-solid fa-chevron-left"></i></span>
										<span class="next" data-controls="next"><i class="fa-solid fa-chevron-right"></i></span>
									</div>

									<div class="categories-slider">
										<?php
											$sqlQuery = "SELECT categories.c_id, categories.c_name, subquery.p_image FROM categories LEFT JOIN (SELECT p_image, c_id FROM products ORDER BY RAND()) AS subquery ON subquery.c_id = categories.c_id GROUP BY categories.c_id;";
											$result = mysqli_query($connection, $sqlQuery);

											if(mysqli_num_rows($result) > 0) {
												while($row = mysqli_fetch_assoc($result)){
													$c_id = $row['c_id'];
													$c_name = $row['c_name'];
													$p_image = $row['p_image'];
										?>
										<div class="item">
											<div class="row justify-content-center">
												<div class="col-lg-8 mx-auto">

													<div class="testimonial-block">
														<div class="product-item-sm d-flex align-items-center">
															<div class="thumbnail">
																<img style="height:25vh" src="uploads/<?php echo $p_image ?>" alt="Image" class="img-fluid">
															</div>
															<div class="pt-3">
																<h3><?php echo $c_name ?></h3>
																<p><a href="./shop.php?cat=<?php echo $c_id ?>">Read More</a></p>
															</div>
														</div>
													</div>

												</div>
											</div>
										</div> 
										<?php
												}
											}
										?>
										<!-- END item -->

									</div>

								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<!-- End We Help Section -->

		<!-- Start Testimonial Slider -->
		<div class="testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Testimonials</h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">

							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider">
								
								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

								<div class="item">
									<div class="row justify-content-center">
										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">Maria Jones</h3>
													<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
												</div>
											</div>

										</div>
									</div>
								</div> 
								<!-- END item -->

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonial Slider -->

		<!-- Start Footer Section -->
		<?php include_once(__DIR__ . "/components/footer.php") ?>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>

		<!-- Ajax Requests -->
		<script src="./js/ajax.js"></script>
	</body>

</html>
