<div class="container my-5">
    <h4 class="text-secondary">Delete Products</h4>

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

                                        <button class='btn btn-primary' onclick='updateModal($pId)'><i class='fa fa-trash'></i> Delete</button>
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
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="upd-modal-title">Update Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <h6>Are you sure you want to delete this product?</h6>
                    <form id="delete-product">
                        <button class="btn btn-primary">
                            <i class='fa fa-trash'></i> Delete
                        </button>
                        <input type="hidden" name="del-product" id="del-product">
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

    let idBox = document.getElementById("del-product");
    idBox.value = id;

}


$(document).ready(function() {
    $('#delete-product').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        var formData = new FormData(this);

        $.ajax({
            url: '../config/validations.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#result').html( response);
                $('#delete-product')[0].reset();

                setTimeout(function() {
                    location.reload();
                }, 2000);
            },
            error: function(xhr, status, error) {
                $('#result').html("An error occurred: " + xhr.responseText);
            }
        });
    });
});


</script>