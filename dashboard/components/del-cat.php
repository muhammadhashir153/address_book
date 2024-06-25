
<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <h4 class="mb-4 text-dark">Delete Categoies</h4>
            <?php
                    $sqlQuery = "SELECT categories.c_id, categories.c_name, COUNT(products.c_id) AS 'product_count' FROM products RIGHT JOIN categories ON products.c_id = categories.c_id GROUP BY categories.c_id";

                    $result = mysqli_query($connection, $sqlQuery);

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $cId = $row['c_id'];
                            $cName = $row['c_name'];
                            $pCount = $row['product_count'];


                            echo "
                                <div class='col-sm-12 col-lg-4'>
                                    <div class='card bg-secondary rounded'>
                                        <div class='card-header text-primary'>
                                            Categories
                                        </div>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$cName</h5>
                                            <p class='card-text'><b>Total Products:</b> $pCount</p>
                                            <button class='btn btn-primary' onclick='updateModal($cId)'><i class='fa-solid fa-trash'></i> Delete</button>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    }else{
                        echo "
                            <div class='my-auto'>
                                <h6>No Categories to show <a href='?url=add-category'>Click Here</a> to add categories</h6>
                            </div>
                        ";
                    }
                ?>
    </div>
</div>
<!-- Form End -->


<div class="modal fade modal-lg" id="exampleModal" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="upd-modal-title">Update Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 class="text-white my-3 text-center">Before Deleting any category, you must have to delete or update the products which are in this category</h6>
                <div class="d-flex justify-content-between">
                    <p>Are you sure you want to delete this product?</p>
                    <form id="delete-cat">
                        <button class="btn btn-primary">
                            <i class='fa-solid fa-trash'></i> Delete
                        </button>
                        <input type="hidden" name="del_cat" id="del_cat">
                    </form>
                </div>
                <div id="result"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">No</button>
                
            </div>
        </div>
    </div>
</div>



<script>

const updateModal = function(id){
    $("#exampleModal").modal('show');

    let idBox = document.getElementById("del_cat");
    idBox.value = id;

}
</script>