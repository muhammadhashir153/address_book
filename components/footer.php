<footer class="footer-section">
    <div class="container relative">
        <div class="row g-5 mb-5">
            <div class="col-lg-4">
                <div class="mb-4 footer-logo-wrap">
                    <a href="#" class="footer-logo">
                        <img src="./images/logo-01-01.png" style="width: 144px;" alt="">
                    </a>
                </div>
                <p class="mb-4">
                    Jenny's Beauty and Bling began as a humble home-based business, driven by a passion for beauty and a commitment to quality. Jenny, our founder, started by reaching out to friends and family, showcasing her curated selection of products. 
                </p>
            </div>

            <div class="col-lg-8">
                <div class="row links-wrap">
                    <div class="col-6 col-sm-6 col-md-4">
                        <h4>Pages</h4>
                        <ul class="list-unstyled">
                            <li><a href="./about.php">About us</a></li>
                            <li><a href="./shop.php">Shop</a></li>
                            <li><a href="./contact.php">Contact us</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-4">
                        <h4>Top Products</h4>
                        <ul class="list-unstyled">
                            <?php
                                $sqlQuery = "SELECT p_id, p_name FROM products GROUP BY RAND() LIMIT 4";
                                $result = mysqli_query($connection, $sqlQuery);

                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $pId = $row['p_id'];
                                        $pName = $row['p_name'];
                            ?>
                                <li><a href="./product.php?pId=<?php echo $pId?>"><?php echo $pName ?></a></li>
                            <?php
                                    }
                                }
                            ?>
                        </ul>
                    </div>

                    <div class="col-6 col-sm-6 col-md-4">
                        <h4>Top Categories</h4>
                        <ul class="list-unstyled">
                            <?php
                                $sqlQuery = "SELECT * FROM categories ORDER BY RAND() LIMIT 4";
                                $result = mysqli_query($connection, $sqlQuery);

                                if(mysqli_num_rows($result)){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $c_id = $row['c_id'];
                                        $c_name = $row['c_name'];
                            ?>
                                    
                            <li><a href="./shop.php?cat=<?php echo $c_id ?>"><?php echo $c_name ?></a></li>
                            <?php
                                    }
                                }
                            ?>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</footer>