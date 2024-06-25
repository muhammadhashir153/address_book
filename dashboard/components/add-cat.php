<!-- <div class="container">
    <div class="row">
        <div class="col-lg-8 col-sm-12 p-5 bg-secondary rounded-5">
            <div class="bg-secondary rounded h-100 p-4">
                <h4>Add New Category</h4>
                <form class="customforms" id="add-cat" enctype="multipart/form-data">
                    <div class="form mb-3">
                        <label for="c_name" class="mb-2">Category Name</label>
                        <input type="text" class="form-control" name="c_name" id="c_name" placeholder="Cateory Name">
                    </div>

                    <div class="form mb-3">
                        <div>
                            <input type="hidden" name="add-cat" id="">
                            <button type="submit" name="add-cat" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                    
                    <div id="result"></div>
                </form>
            </div>
        </div>

        <div class="col-3">
            <h4>Current Categories</h4>
            <ul class="list-group">


            <?php
                $sqlQuery = "SELECT * FROM `categories`";

                $result = mysqli_query($connection, $sqlQuery);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $cName = $row['c_name'];

                        echo "
                            <li class='list-group-item'>$cName</li>
                        ";
                    }
                }else{
                    echo "
                        <div class='my-auto'>
                            <h6>No categories to show</h6>
                        </div>
                    ";
                }

            ?>
            </ul>
        </div>
    </div>
</div>




<script>
    $(document).ready(function() {
            $('#add-cat').on('submit', function(event) {
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
                        $('#add-cat')[0].reset();
                    },
                    error: function(xhr, status, error) {
                        $('#result').html("An error occurred: " + xhr.responseText);
                    }
                });
            });
        });
</script> -->



<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <h4 class="mb-4">Add Category</h4>
                <form class="customforms" id="add-cat">
                    <div class="form mb-3">
                        <label for="c_name" class="mb-2 text-white">Category Name</label>
                        <input type="text" class="form-control" name="c_name" id="c_name" placeholder="Cateory Name">
                    </div>

                    <div class="form mb-3">
                        <div>
                            <input type="hidden" name="add-cat" id="">
                            <button type="submit" name="add-cat" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                    
                    <div id="result"></div>
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-xl-4">
            <div class="rounded h-100 p-2">
                <div class="d-flex justify-content-between">
                    <h4 class="text-primary">Available categories</h4>
                    <a href="#">See All</a>
                </div>
                <ul class="list-group my-3 list-group-flush">


                <?php
                    $sqlQuery = "SELECT * FROM `categories`";

                    $result = mysqli_query($connection, $sqlQuery);

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $cName = $row['c_name'];

                            echo "
                                <li class='list-group-item'>$cName</li>
                            ";
                        }
                    }else{
                        echo "
                            <div class='my-auto'>
                                <h6>No categories to show</h6>
                            </div>
                        ";
                    }

                ?>
                </ul>

                
            </div>
        </div>
    </div>
</div>
<!-- Form End -->

