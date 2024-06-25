<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">

<div class="row g-4">
    <div class="col-sm-6 col-xl-3">
        <?php
            $sqlQuery = "SELECT COUNT(`p_id`) AS 'p_id' FROM `products`";
            $result = mysqli_query($connection, $sqlQuery);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                $pCount = $row['p_id'];

                echo "
                    <div class='bg-secondary rounded d-flex align-items-center justify-content-between p-4'>
                        <i class='fa fa-box fa-3x text-primary'></i>
                        <div class='ms-3'>
                            <p class='mb-2'>Products</p>
                            <h6 class='mb-0'>$pCount</h6>
                        </div>
                    </div>
                        ";
                    }
            } else {
                echo "
                    <h1 class='display-4 text-center'>0</h1>
                    <div class='progress' role='progressbar' aria-label='Animated striped example' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100'>
                    <div class='progress-bar progress-bar-striped' style='width: 0;'></div>
                    </div>
                ";
            }
        ?>
    </div>
    <div class="col-sm-6 col-xl-3">
        <?php
            $sqlQuery = "SELECT COUNT(`c_id`) AS 'c_id' FROM `categories`";
            $result = mysqli_query($connection, $sqlQuery);

            if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $cCount = $row['c_id'];

                echo "
                    <div class='bg-secondary rounded d-flex align-items-center justify-content-between p-4'>
                        <i class='fa fa-list fa-3x text-primary'></i>
                        <div class='ms-3'>
                            <p class='mb-2'>Categories</p>
                            <h6 class='mb-0'>$cCount</h6>
                        </div>
                    </div>
                    ";
            }
            }
        ?>
        
    </div>
    <div class="col-sm-6 col-xl-3">
        <?php
            $sqlQuery = "SELECT COUNT(`u_id`) AS 'u_id' FROM `user_account`";
            $result = mysqli_query($connection, $sqlQuery);

            if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $uCount = $row['u_id'];

                echo "
                    <div class='bg-secondary rounded d-flex align-items-center justify-content-between p-4'>
                        <i class='fa fa-users fa-3x text-primary'></i>
                        <div class='ms-3'>
                            <p class='mb-2'>Users</p>
                            <h6 class='mb-0'>$uCount</h6>
                        </div>
                    </div>
                    ";
            }
            }
        ?>
        
    </div>
    <div class="col-sm-6 col-xl-3">
        <?php
            $sqlQuery = "SELECT COUNT(`o_id`) AS 'o_id' FROM `orders`";
            $result = mysqli_query($connection, $sqlQuery);

            if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $cartCount = $row['o_id'];

                echo "
                    <div class='bg-secondary rounded d-flex align-items-center justify-content-between p-4'>
                        <i class='fa fa-chart-pie fa-3x text-primary'></i>
                        <div class='ms-3'>
                            <p class='mb-2'>Sales</p>
                            <h6 class='mb-0'>$cartCount</h6>
                        </div>
                    </div>
                    ";
            }
            }
        ?>
        
    </div>
</div>
</div>
<!-- Sale & Revenue End -->


<!-- Charts Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Pie Chart</h6>
                <canvas id="pie-chart"></canvas>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Doughnut Chart</h6>
                <canvas id="doughnut-chart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Charts End -->



<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
<div class="bg-secondary text-center rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Recent Salse</h6>
        <a href="">Show All</a>
    </div>
    <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
            <thead>
                <tr class="text-white">
                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                    <th scope="col">Date</th>
                    <th scope="col">Invoice</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input class="form-check-input" type="checkbox"></td>
                    <td>01 Jan 2045</td>
                    <td>INV-0123</td>
                    <td>Jhon Doe</td>
                    <td>$123</td>
                    <td>Paid</td>
                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox"></td>
                    <td>01 Jan 2045</td>
                    <td>INV-0123</td>
                    <td>Jhon Doe</td>
                    <td>$123</td>
                    <td>Paid</td>
                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox"></td>
                    <td>01 Jan 2045</td>
                    <td>INV-0123</td>
                    <td>Jhon Doe</td>
                    <td>$123</td>
                    <td>Paid</td>
                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox"></td>
                    <td>01 Jan 2045</td>
                    <td>INV-0123</td>
                    <td>Jhon Doe</td>
                    <td>$123</td>
                    <td>Paid</td>
                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                </tr>
                <tr>
                    <td><input class="form-check-input" type="checkbox"></td>
                    <td>01 Jan 2045</td>
                    <td>INV-0123</td>
                    <td>Jhon Doe</td>
                    <td>$123</td>
                    <td>Paid</td>
                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
<!-- Recent Sales End -->

