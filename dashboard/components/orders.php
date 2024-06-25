<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded-top p-4">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">All users</h6>
            <div class="table-responsive">
                <table class="table">
                    
                        <?php
                            $sqlQuery = "SELECT orders.o_id, orders.invoice_num, orders.order_date, user_account.u_name, GROUP_CONCAT(CONCAT(products.p_name, ' X ', order_items.quantity) SEPARATOR ', ') AS product_details, COUNT(order_items.p_id) AS product_count FROM  orders INNER JOIN user_account ON orders.u_id = user_account.u_id INNER JOIN  order_items ON orders.o_id = order_items.o_id INNER JOIN  products ON order_items.p_id = products.p_id GROUP BY orders.o_id, orders.invoice_num, orders.order_date, user_account.u_name HAVING COUNT(order_items.p_id) >= 1;";
                            $result = mysqli_query($connection, $sqlQuery);

                            if(mysqli_num_rows($result) > 0){
                                $x = 1;

                                echo "
                                    <thead>
                                        <tr>
                                            <th scope='col'>S no.</th>
                                            <th scope='col'>Order Id</th>
                                            <th scope='col'>Invoice Num</th>
                                            <th scope='col'>Customer Name</th>
                                            <th scope='col'>Product Details</th>
                                            <th scope='col'>Product Count</th>
                                            <th scope='col'>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                ";
                                while($row = mysqli_fetch_assoc($result)){
                                    $oId = $row['o_id'];
                                    $invoice = $row['invoice_num'];
                                    $uName= $row['u_name'];
                                    $pDetails = $row['product_details'];
                                    $pCount = $row['product_count'];

                                    echo "
                                        <tr>
                                            <th scope='row'>$x</th>
                                            <td>$oId</td>
                                            <td>$invoice</td>
                                            <td>$uName</td>
                                            <td>$pDetails</td>
                                            <td>$pCount</td>
                                            <td>
                                                <button class='btn btn-dark' onclick='deleteModal($oId)'><i class='fa-solid fa-trash'></i></button>
                                            </td>
                                            
                                        </tr>
                                    ";

                                    $x++;
                                }
                            }else{
                                echo "
                                    <p>No Orders found!</p>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Delete confirmation -->

<div class="modal fade modal-lg" id="exampleModal" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="upd-modal-title">Update User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <p>Are you sure you want to delete this user?</p>
                    <form id="delete-order">
                        <button class="btn btn-primary">
                            <i class='fa-solid fa-trash'></i> Delete
                        </button>
                        <input type="hidden" name="del_order" id="del_order">
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
const deleteModal = function(id){
    $("#exampleModal").modal('show');

    let idBox = document.getElementById("del_order");
    idBox.value = id;
}




$(document).ready(function() {
    $('#delete-order').on('submit', function(event) {
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
                $('#delete-user')[0].reset();

                setTimeout(function() {
                    location.reload();
                }, 20);
            },
            error: function(xhr, status, error) {
                $('#result').html("An error occurred: " + xhr.responseText);
            }
        });
    });
});




</script>