<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded-top p-4">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Top 10 users based on max shopping</h6>
            <div class="table-responsive">
                <table class="table">
                    
                        <?php
                            $sqlQuery = "SELECT oi.p_id, p.p_name, SUM(oi.quantity) AS total_quantity FROM order_items oi INNER JOIN	products p ON oi.p_id=p.p_id GROUP BY oi.p_id ORDER BY `total_quantity` DESC LIMIT 10";
                            $result = mysqli_query($connection, $sqlQuery);

                            if(mysqli_num_rows($result) > 0){
                                $x = 1;

                                echo "
                                    <thead>
                                        <tr>
                                            <th scope='col'>S No.</th>
                                            <th scope='col'>Product Name</th>
                                            <th scope='col'>Total Sell</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                ";
                                while($row = mysqli_fetch_assoc($result)){
                                    $pId = $row['p_id'];
                                    $pName = $row['p_name'];
                                    $totalCount = $row['total_quantity'];

                                    echo "
                                        <tr>
                                            <th scope='row'>$x</th>
                                            <td>
                                                <a title='view product' target='_blank' href='../product.php?pId=$pId'>$pName</a>
                                            </td>
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
