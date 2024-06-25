<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded-top p-4">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">All users</h6>
            <div class="table-responsive">
                <table class="table">
                    
                        <?php
                            $sqlQuery = "SELECT * FROM `user_detail`";
                            $result = mysqli_query($connection, $sqlQuery);

                            if(mysqli_num_rows($result) > 0){
                                $x = 1;

                                echo "
                                    <thead>
                                        <tr>
                                            <th scope='col'>S No.</th>
                                            <th scope='col'>Name</th>
                                            <th scope='col'>Address</th>
                                            <th scope='col'>Email</th>
                                            <th scope='col'>Work Number</th>
                                            <th scope='col'>Phone Number</th>
                                            <th scope='col'>Date of Birth</th>
                                            <th colspan='2' scope='col'>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                ";
                                while($row = mysqli_fetch_assoc($result)){
                                    $udId = $row['ud_id'];
                                    $udName = $row['ud_name'];
                                    $udEmail = $row['ud_email'];
                                    $udAddress = $row['ud_adress'];
                                    $udWorkNum = $row['ud_work_num'];
                                    $udPersonalNum = $row['ud_phone_num'];
                                    $udDOB = $row['ud_dob'];

                                    echo "
                                        <tr>
                                            <th scope='row'>$x</th>
                                            <td>$udName</td>
                                            <td>$udAddress</td>
                                            <td>$udEmail</td>
                                            <td>$udWorkNum</td>
                                            <td>$udPersonalNum</td>
                                            <td>$udDOB</td>
                                            <td>
                                                <button class='btn btn-primary' onclick='updateModal($udId)'><i class='fa-solid fa-pen'></i></button>
                                            </td>
                                            <td>
                                                <button class='btn btn-dark' onclick='deleteModal($udId)'><i class='fa-solid fa-trash'></i></button>
                                            </td>
                                            
                                        </tr>
                                    ";
                                    $x++;
                                }
                            }else{
                                echo "
                                    <p>No user found!</p>
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
                    <form id="delete-user">
                        <button class="btn btn-primary">
                            <i class='fa-solid fa-trash'></i> Delete
                        </button>
                        <input type="hidden" name="del_user" id="del_user">
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

<!-- Update Form -->
<div class="modal fade modal-lg" id="updateModal" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header bg-secondary">
                <h1 class="modal-title fs-5" id="upd-modal-title">Update User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-secondary">
            <form class="customforms" id="upd-user" enctype="multipart/form-data">
                <div class="form mb-3">
                    <label for="col-select" class="mb-2 text-white">Select what to update</label>
                    <select onchange="updateForm()" class="form-select" name="col_name" id="col-select">
                        <option>Select options</option>
                        <option value="ud_name">User name</option>
                        <option value="ud_adress">User address</option>
                        <option value="ud_email">User email</option>
                        <option value="ud_work_num">User work number</option>
                        <option value="ud_phone_num">User phone number</option>
                        <option value="ud_dob">User date of birth</option>
                    </select>
                </div>

                <div class="form mb-3" id="upd-p-img">
                    <label for="ud_adress" class="mb-2 text-white">Address</label>
                    <input type="text" class="form-control" name="ud_adress" id="ud_adress" placeholder="Update Address">
                </div>

                <div class="form mb-3" id="upd-p-name">
                    <label for="ud_name" class="mb-2 text-white">Name</label>
                    <input type="text" class="form-control" name="ud_name" id="ud_name" placeholder="Change Name">
                </div>

                <div class="form mb-3" id="upd-p-price">
                    <label for="ud_email" class="mb-2 text-white">Email</label>
                    <input type="email" class="form-control" name="ud_email" id="ud_email" placeholder="Update Email">
                </div>

                <div class="form mb-3" id="upd-p-stock">
                    <label for="ud_work_num" class="mb-2 text-white">Work Number</label>
                    <input type="tel" class="form-control" name="ud_work_num" id="ud_work_num" placeholder="Update Work Number">
                </div>

                <div class="form mb-3" id="upd-p-cat">
                    <label for="ud_phone_num" class="mb-2 text-white">Phone Number</label>
                    <input type="tel" class="form-control" id="ud_phone_num" name="ud_phone_num" placeholder="Update Phone Number">
                        
                </div>

                <div class="form mb-3" id="upd-p-dob">
                    <label for="ud_dob" class="mb-2 text-white">Date of birth</label>
                    <input type="date" class="form-control" id="ud_dob" name="ud_dob" placeholder="Update date of birth">
                        
                </div>

                <div class="form mb-3">
                    <div>
                        <input type="hidden" name="ud_id" id="ud_id">
                        <input type="hidden" name="upd_user" id="">
                        <button type="submit" name="upd_user" class="btn btn-primary">Submit</button>
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
    $("#updateModal").modal('show');

    let idBox = document.getElementById("ud_id");
    idBox.value = id;
}
const deleteModal = function(id){
    $("#exampleModal").modal('show');

    let idBox = document.getElementById("del_user");
    idBox.value = id;
}




$(document).ready(function() {
    $('#delete-user').on('submit', function(event) {
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

$(document).ready(function() {
    $('#upd-user').on('submit', function(event) {
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
                $('#upd-user')[0].reset();

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


const updateForm = function(){
    let options = document.getElementById("col-select").value;

    switch(options){
        case "ud_name":
            document.getElementById("upd-p-name").style.display = "block";

            document.getElementById("upd-p-cat").style.display = "none";
            document.getElementById("upd-p-img").style.display = "none";
            document.getElementById("upd-p-price").style.display = "none";
            document.getElementById("upd-p-stock").style.display = "none";
            document.getElementById("upd-p-dob").style.display = "none";
        break;
        case "ud_adress":
            document.getElementById("upd-p-img").style.display = "block";

            document.getElementById("upd-p-cat").style.display = "none";
            document.getElementById("upd-p-name").style.display = "none";
            document.getElementById("upd-p-price").style.display = "none";
            document.getElementById("upd-p-stock").style.display = "none";
            document.getElementById("upd-p-dob").style.display = "none";
        break;
        case "ud_email":
            document.getElementById("upd-p-price").style.display = "block";

            document.getElementById("upd-p-cat").style.display = "none";
            document.getElementById("upd-p-img").style.display = "none";
            document.getElementById("upd-p-name").style.display = "none";
            document.getElementById("upd-p-stock").style.display = "none";
            document.getElementById("upd-p-dob").style.display = "none";
        break;
        case "ud_work_num":
            document.getElementById("upd-p-stock").style.display = "block";

            document.getElementById("upd-p-cat").style.display = "none";
            document.getElementById("upd-p-img").style.display = "none";
            document.getElementById("upd-p-price").style.display = "none";
            document.getElementById("upd-p-price").style.display = "none";
            document.getElementById("upd-p-dob").style.display = "none";
        break;
        case "ud_phone_num":
            document.getElementById("upd-p-cat").style.display = "block";

            document.getElementById("upd-p-name").style.display = "none";
            document.getElementById("upd-p-img").style.display = "none";
            document.getElementById("upd-p-price").style.display = "none";
            document.getElementById("upd-p-stock").style.display = "none";
            document.getElementById("upd-p-dob").style.display = "none";
        break;
        case "ud_dob":
            document.getElementById("upd-p-dob").style.display = "block";

            document.getElementById("upd-p-cat").style.display = "none";

            document.getElementById("upd-p-name").style.display = "none";
            document.getElementById("upd-p-img").style.display = "none";
            document.getElementById("upd-p-price").style.display = "none";
            document.getElementById("upd-p-stock").style.display = "none";
        break;
    }
}

</script>