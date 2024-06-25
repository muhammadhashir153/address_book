<!-- <div class="container my-5">
    <h1 class="display-6">Update Categories</h1>

        <div class="row g-4 py-5">
            <?php
                $sqlQuery = "SELECT categories.c_id, categories.c_name, COUNT(products.c_id) AS 'product_count' FROM products RIGHT JOIN categories ON products.c_id = categories.c_id GROUP BY categories.c_id";

                $result = mysqli_query($connection, $sqlQuery);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $cId = $row['c_id'];
                        $cName = $row['c_name'];
                        $pCount = $row['product_count'];


                        echo "
                            <div class='col-4'>
                                <div class='card'>
                                    <div class='card-header'>
                                        Categories
                                    </div>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$cName</h5>
                                        <p class='card-text'><b>Total Products:</b> $pCount</p>
                                        <button class='btn db-btns' onclick='updateModal($cId)'><i class='fa-solid fa-pen'></i> Update</button>
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
</div>


<div class="modal fade modal-lg" id="exampleModal" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="upd-modal-title">Update Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="customforms" id="upd-cat" enctype="multipart/form-data">
                <div class="form mb-3">
                    <label for="c_name" class="mb-2">Cateory Name</label>
                    <input type="text" class="form-control" name="c_name" id="c_name" placeholder="Rename this category">
                </div>
                
                <div class="form mb-3">
                    <div>
                        <input type="hidden" name="c_id" id="c_id">
                        <input type="hidden" name="upd-cat" id="">
                        <button type="submit" name="upd-cat" class="btn db-btns">Submit</button>
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

    let idBox = document.getElementById("c_id");
    idBox.value = id;

}


$(document).ready(function() {
    $('#upd-cat').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        var formData = new FormData(this);

        $.ajax({
            url: 'config/validations.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#result').html( response);
                $('#upd-cat')[0].reset();

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


</script> -->


<div class="container my-5">
    <h4 class="text-secondary">Update Categories</h4>

        <div class="row g-4 py-5">
            <?php
                    $sqlQuery = "SELECT categories.c_id, categories.c_name, COUNT(products.c_id) AS 'product_count' FROM products RIGHT JOIN categories ON products.c_id = categories.c_id GROUP BY categories.c_id";

                    $result = mysqli_query($connection, $sqlQuery);

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $cId = $row['c_id'];
                            $cName = $row['c_name'];
                            $pCount = $row['product_count'];


                            echo "
                                <div class='col-lg-4 col-sm-12'>
                                    <div class='card bg-secondary rounded'>
                                        <div class='card-header text-primary'>
                                            Categories
                                        </div>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$cName</h5>
                                            <p class='card-text'><b>Total Products:</b> $pCount</p>
                                            <button class='btn btn-primary' onclick='updateModal($cId)'><i class='fa-solid fa-pen'></i> Update</button>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    }else{
                        echo "
                            <div class='my-auto'>
                                <p>No Categories to show <a href='?url=add-category'>Click Here</a> to add categories</p>
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
                <form class="customforms" id="upd-cat">
                    <div class="form mb-3">
                        <label for="c_name" class="mb-2 text-white">Cateory Name</label>
                        <input type="text" class="form-control" name="c_name" id="c_name" placeholder="Rename this category">
                    </div>
                    
                    <div class="form mb-3">
                        <div>
                            <input type="hidden" name="c_id" id="c_id">
                            <input type="hidden" name="upd-cat" id="">
                            <button type="submit" name="upd-cat" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    
                    <div id="result" ></div>
                </form>
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

    let idBox = document.getElementById("c_id");
    idBox.value = id;
}




$(document).ready(function() {
    $('#upd-cat').on('submit', function(event) {
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
                $('#upd-cat')[0].reset();

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