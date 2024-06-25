<div class="container my-5">
    <h4 class="text-secondary">Update Products</h4>

        <div class="row g-4 py-5">
            <?php
                $sqlQuery = "SELECT * FROM `products` INNER JOIN `categories` WHERE products.c_id=categories.c_id";

                $result = mysqli_query($connection, $sqlQuery);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $pId = $row['p_id'];
                        $pName = $row['p_name'];
                        $pPrice = $row['p_price'];
                        $pStock = $row['p_stock'];
                        $pCat = $row['c_name'];
                        $pImage = $row['p_image'];

                        echo "
                            <div class='col-sm-12 col-lg-4'>
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

                                        <button class='btn btn-primary' onclick='updateModal($pId)'><i class='fa fa-pen'></i> Update</button>
                                    </div>
                                </div>
                            </div>
                        ";
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


<div class="modal fade modal-lg" id="exampleModal" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header bg-secondary">
                <h1 class="modal-title fs-5" id="upd-modal-title">Update Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-secondary">
            <form class="customforms" id="upd-product" enctype="multipart/form-data">
                <div class="form mb-3">
                    <label for="col-select" class="mb-2 text-white">Select what to update</label>
                    <select onchange="updateForm()" class="form-select" name="col_name" id="col-select">
                        <option>Select options</option>
                        <option value="p_name">Product Name</option>
                        <option value="p_price">Product Price</option>
                        <option value="p_stock">Available Stock</option>
                        <option value="c_id">Change Category</option>
                        <option value="p_image">Product Image</option>
                    </select>
                </div>

                <div class="form mb-3" id="upd-p-img">
                    <label for="p_image" class="mb-2 text-white">Image</label>
                    <input type="file" class="form-control" name="p_image" id="p_image" placeholder="">
                </div>

                <div class="form mb-3" id="upd-p-name">
                    <label for="p_name" class="mb-2 text-white">Name</label>
                    <input type="text" class="form-control" name="p_name" id="p_name" placeholder="Change Name">
                </div>

                <div class="form mb-3" id="upd-p-price">
                    <label for="p_price" class="mb-2 text-white">Price</label>
                    <input type="text" class="form-control" name="p_price" id="p_price" placeholder="Update Price">
                </div>

                <div class="form mb-3" id="upd-p-stock">
                    <label for="p_stock" class="mb-2 text-white">Stock</label>
                    <input type="text" class="form-control" name="p_stock" id="p_stock" placeholder="Update Stock">
                </div>

                <div class="form mb-3" id="upd-p-cat">
                    <label for="p_cat" class="mb-2 text-white">Select Category</label>
                    <select class="form-select" id="p_cat" name="c_id">
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
                        <input type="hidden" name="p_id" id="p_id">
                        <input type="hidden" name="upd-product" id="">
                        <button type="submit" name="upd-product" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                
                <div id="result" ></div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
const updateModal = function(id){
    $("#exampleModal").modal('show');

    let idBox = document.getElementById("p_id");
    idBox.value = id;
}

const updateForm = function(){
    let options = document.getElementById("col-select").value;

    switch(options){
        case "p_name":
            document.getElementById("upd-p-name").style.display = "block";

            document.getElementById("upd-p-cat").style.display = "none";
            document.getElementById("upd-p-img").style.display = "none";
            document.getElementById("upd-p-price").style.display = "none";
            document.getElementById("upd-p-stock").style.display = "none";
        break;
        case "p_image":
            document.getElementById("upd-p-img").style.display = "block";

            document.getElementById("upd-p-cat").style.display = "none";
            document.getElementById("upd-p-name").style.display = "none";
            document.getElementById("upd-p-price").style.display = "none";
            document.getElementById("upd-p-stock").style.display = "none";
        break;
        case "p_price":
            document.getElementById("upd-p-price").style.display = "block";

            document.getElementById("upd-p-cat").style.display = "none";
            document.getElementById("upd-p-img").style.display = "none";
            document.getElementById("upd-p-name").style.display = "none";
            document.getElementById("upd-p-stock").style.display = "none";
        break;
        case "p_stock":
            document.getElementById("upd-p-stock").style.display = "block";

            document.getElementById("upd-p-cat").style.display = "none";
            document.getElementById("upd-p-img").style.display = "none";
            document.getElementById("upd-p-price").style.display = "none";
            document.getElementById("upd-p-price").style.display = "none";
        break;
        case "c_id":
            document.getElementById("upd-p-cat").style.display = "block";

            document.getElementById("upd-p-name").style.display = "none";
            document.getElementById("upd-p-img").style.display = "none";
            document.getElementById("upd-p-price").style.display = "none";
            document.getElementById("upd-p-stock").style.display = "none";
        break;
    }
}
</script>