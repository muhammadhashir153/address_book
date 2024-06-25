
<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <h4 class="mb-4">Add Product</h4>
                <form class="customforms" id="add-product" enctype="multipart/form-data">
                    <div class="form mb-3">
                        <label for="p_name">Product Name</label>
                        <input type="text" class="form-control" name="p_name" id="p_name" placeholder="Product Name">
                    </div>

                    <div class="form mb-3">
                        <label for="p_price">Price</label>
                        <input type="text" class="form-control" name="p_price" id="p_price" placeholder="Price in $">
                    </div>

                    <div class="form mb-3">
                        <label for="p_stock">Stock</label>
                        <input type="text" class="form-control" name="p_stock" id="p_stock" placeholder="Stock">
                    </div>

                    <div class="form mb-3">
                        <label for="p_image" class="mb-2">Image</label>
                        <input type="file" class="form-control bg-dark" name="p_image" id="p_image" placeholder="">
                    </div>

                    <div class="form mb-3">
                        <label for="p_desc" class="mb-2">Product Description</label>
                    
                        <textarea  name="p_desc" id="p_desc" class="form-control" placeholder="Product Description"></textarea>
                    </div>

                    <div class="form mb-3">
                        <label for="p_cat" class="mb-2">Select Category</label>
                        <select class="form-select" id="p_cat" name="p_cat">
                            <option>Open this select menu</option>
                            <?php
                                $sqlQuery = 'SELECT * FROM `categories`';

                                $result = mysqli_query($connection, $sqlQuery);

                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $c_id = $row['c_id'];
                                        $c_name = $row['c_name'];

                                        echo "
                                            <option value='$c_id'>$c_name</option>
                                        ";
                                    }

                                    
                                }else{
                                    echo "<option>No Cateories Available, Click here</a> to add</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form mb-3">
                        <div>
                            <input type="hidden" name="add-product" id="">
                            <button type="submit" name="add-product" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    
                    <div id="result" ></div>
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-xl-4">
            <div class="rounded h-100 p-2">
                <div class="d-flex justify-content-between">
                    <h4 class="text-primary">In Stock</h4>
                    <a href="#">See All</a>
                </div>

                <?php
                    $sqlQuery = "SELECT * FROM `products` INNER JOIN `categories` ON products.c_id=categories.c_id LIMIT 4";

                    $result = mysqli_query($connection, $sqlQuery);

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $pName = $row['p_name'];
                            $pPrice = $row['p_price'];
                            $pStock = $row['p_stock'];
                            $pCat = $row['c_name'];
                            $pImage = $row['p_image'];

                            if($pStock !== 0){
                                echo "
                                    <div class='product-item my-3'>
                                        <div class='product-img'>
                                            <img src='../uploads/$pImage' class='img-fluid product-thumbnail' alt='...'>
                                        </div>
                                        <div class='card-body'>
                                            <div class='d-flex justify-content-between'>
                                                <h5 class='product-title'>$pName</h5>
                                                <p class='product-price'>$$pPrice</p>
                                            </div>
                                            <div class='d-flex justify-content-between'>
                                                <p class='card-text'><b>Category:</b> $pCat</p>
                                                <p class='card-text'><b>InStock:</b> $pStock</p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                ";
                            }
                        }
                    }else{
                        echo "
                            <div class='my-auto'>
                                <p class='text-dark'>No Products to show <a href='?url=add-product'>Click Here</a> to add products</p>
                            </div>
                        ";
                    }

                ?>

                
            </div>
        </div>
    </div>
</div>
<!-- Form End -->


