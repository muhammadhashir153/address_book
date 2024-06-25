<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded-top p-4">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Top 10 users based on max shopping</h6>
            <div class="table-responsive">
                <table class="table">
                    
                        <?php
                            $sqlQuery = "SELECT o.u_id, user_account.u_name, SUM(oi.quantity) AS total_quantity FROM `orders` o INNER JOIN order_items oi INNER JOIN user_account ON o.o_id = oi.o_id AND o.u_id=user_account.u_id GROUP BY o.u_id ORDER BY  total_quantity DESC LIMIT 10;";
                            $result = mysqli_query($connection, $sqlQuery);

                            if(mysqli_num_rows($result) > 0){
                                $x = 1;

                                echo "
                                    <thead>
                                        <tr>
                                            <th scope='col'>S No.</th>
                                            <th scope='col'>Client Name</th>
                                            <th scope='col'>Total Number of Porducts</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                ";
                                while($row = mysqli_fetch_assoc($result)){
                                    $u_name = $row['u_name'];
                                    $totalCount = $row['total_quantity'];

                                    echo "
                                        <tr>
                                            <th scope='row'>$x</th>
                                            <td>$u_name</td>
                                            <td>$totalCount</td>
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
