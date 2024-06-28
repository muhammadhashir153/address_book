<?php
    require_once("database-con.php");

    if(isset($_POST['add-product'])){
        $pName = $_POST['p_name'];
        $pPrice = $_POST['p_price'];
        $pStock = $_POST['p_stock'];
        $imageName = $_FILES['p_image']['name'];
        $imagePath = $_FILES['p_image']['tmp_name'];
        $imageSize = $_FILES['p_image']['size'];
        $imageType = $_FILES['p_image']['type'];

        $pCat = $_POST['p_cat'];
        $pStock = $_POST['p_stock'];
        $pDesc = $_POST['p_desc'];

        $newImageName = time() . $imageName;


        if(move_uploaded_file($imagePath, "../uploads/$newImageName")){
            if($pName !== "" && $pPrice !== "" && $pStock !== "" && $pCat !== "" && $pStock !== ""){

               $sqlQuery = "SELECT `p_name` FROM `products` WHERE `p_name`='$pName'";
               $result = mysqli_query($connection, $sqlQuery);

               if(mysqli_num_rows($result) > 0){
                    echo "Product name is already taken";
               }else{
                    $sqlQuery = "INSERT INTO `products`(`p_name`, `p_image`, `p_price`, `c_id`, `p_stock`, `p_desc`) VALUES ('$pName','$newImageName','$pPrice','$pCat','$pStock', '$pDesc')";
        
                    $result = mysqli_query($connection, $sqlQuery);
        
                    if($result){
                        echo "<div class='bg-success'>Success!</div>";
                        // header("location: /dashboard.php?url=add-product");
                    }else{
                        echo "Error" . mysqli_error($connection);
                        // header("location: /dashboard.php?url=add-product");
                    }
                    
               }

            }else{  
                echo "Please fille all the fields";
            }
        }else{
            echo "
                <div class='bg-warning text-white'>Error Message</div>
            ";
        }

        
    }

    if(isset($_POST['add-cat'])){
        $cName = $_POST['c_name'];

        if($cName !== ""){
            $sqlQuery = "SELECT `c_name` FROM `categories` WHERE `c_name`='$cName'";

            $result = mysqli_query($connection, $sqlQuery);

            if(mysqli_num_rows($result) > 0){
                echo "Category found";
            }else{
                $sqlQuery = "INSERT INTO `categories`(`c_name`) VALUES ('$cName')";

                $result = mysqli_query($connection, $sqlQuery);

                if($result){
                    echo "Success!";
                }else{
                    echo "
                        Error Message
                    ";
                }
            }

            
        }
    }

    if(isset($_POST['upd-product'])){
        $col_name = $_POST['col_name'];
        if($col_name == 'p_image'){
            $imageName= $_FILES['p_image']['name'];
            $imagePath = $_FILES['p_image']['tmp_name'];
            $imageSize = $_FILES['p_image']['size'];
            $imageType = $_FILES['p_image']['type'];


            $col_value = time() . $imageName;
        }else{
            $col_value = $_POST["$col_name"];
        }
        $pId = $_POST['p_id'];

            if($col_name == 'p_image') move_uploaded_file($imagePath, "../uploads/$col_value");

            $sqlQuery = "UPDATE `products` SET `$col_name`='$col_value' WHERE `p_id`=$pId";

            $result = mysqli_query($connection, $sqlQuery);

            if($result){
                echo "Updated";
            }else{
                echo "
                    Error Message
                ";
            }
    }

    if(isset($_POST['del-product'])){
        $pId = $_POST['del-product'];


        $sqlQuery = "DELETE FROM `products` WHERE `p_id`=$pId";

        $result = mysqli_query($connection, $sqlQuery);

        if($result){
            echo "Deleted";
        }else{
            echo "
                Error Message
            ";
        }
    }

    if(isset($_POST['upd-cat'])){

        $cId = $_POST['c_id'];
        $cName = $_POST['c_name'];

        $sqlQuery = "UPDATE `categories` SET `c_name`='$cName' WHERE `c_id`=$cId;";

        $result = mysqli_query($connection, $sqlQuery);
        
        if($result){
            echo "Updated";
        }else{
            echo "
                Error Message
            ";
        }
    }

    if(isset($_POST['del_cat'])){
        $cId = $_POST['del_cat'];


        $sqlQuery = "DELETE FROM `categories` WHERE `c_id`=$cId";

        $result = mysqli_query($connection, $sqlQuery);

        if($result){
            echo "Deleted";
        }else{
            echo "
                Error Message
            ";
        }
    }

    if(isset($_POST['del_user'])){
        $udId = $_POST['del_user'];


        $sqlQuery = "DELETE FROM `user_detail` WHERE `ud_id`=$udId";

        $result = mysqli_query($connection, $sqlQuery);

        if($result){
            echo "Deleted";
        }else{
            echo "
                Error Message
            ";
        }
    }

    if(isset($_POST['del_order'])){
        $oId = $_POST['del_order'];


        $sqlQuery = "DELETE FROM `order_items` WHERE `o_id`=$oId; DELETE FROM `orders` WHERE `o_id`=$oId;";

        $result = mysqli_multi_query($connection, $sqlQuery);

        if($result){
            echo "Deleted";
        }else{
            echo "
                Error Message
            ";
        }
    }


    if(isset($_POST['upd_user'])){
        $col_name = $_POST['col_name'];
        
        $col_value = $_POST["$col_name"];
        $udId = $_POST['ud_id'];

            // if($col_name == 'p_image') move_uploaded_file($imagePath, "../uploads/$col_value");

            $sqlQuery = "UPDATE `user_detail` SET `$col_name`='$col_value' WHERE `ud_id`=$udId";

            $result = mysqli_query($connection, $sqlQuery);

            if($result){
                echo "Updated";
            }else{
                echo "
                    Error Message
                ";
            }
    }


    function registration(){
        if(isset($_POST['reg_form'])){
            global $connection;
            $uName = $_POST['u_name'];
            $uEmail = $_POST['u_email'];
            $uPass = $_POST['u_pass'];

            $userHashedPass = password_hash($uPass, PASSWORD_DEFAULT);

            $sqlQuery = "SELECT `u_email` FROM `user_account` WHERE `u_email`='$uEmail'";
            $result = mysqli_query($connection, $sqlQuery);

            if(mysqli_num_rows($result) > 0){
                echo "Email already exist!";
            }else{
                $sqlQuery = "INSERT INTO `user_account`( `u_role`, `u_name`, `u_email`, `u_pass`) VALUES ('user','$uName','$uEmail','$userHashedPass')";
                $result = mysqli_query($connection, $sqlQuery);

                if($result){
                    echo "Registered Successfully";
                    
                }else{
                    echo "There is an error";
                }
            }
        }
    }

    function login(){
        global $connection;
        if(isset($_POST['login_form'])){
            $uEmail = $_POST['u_email'];
            $uPass = $_POST['u_pass'];

            $sqlQuery = "SELECT * FROM `user_account` WHERE `u_email`=?";

            if($statement = mysqli_prepare($connection, $sqlQuery)){
                mysqli_stmt_bind_param($statement, "s", $uEmail);
                mysqli_stmt_execute($statement);

                $result = mysqli_stmt_get_result($statement);

                if(mysqli_num_rows($result) > 0){
            
                    $row = mysqli_fetch_assoc($result);
                    $uId = $row['u_id'];
                    $storedPass = $row['u_pass'];
                    if(password_verify($uPass, $storedPass)){
                        $uName = $row['u_name'];
                        $uRole = $row['u_role'];

                        if(session_status() == PHP_SESSION_NONE){
                            session_start();
                            
                            $_SESSION['u_id'] = $uId;
                            $_SESSION['u_name'] = $uName;
                            $_SESSION['u_role'] = $uRole;

                            if($uRole == 'admin'){
                                echo json_encode(['success' => true, 'admin' => true , 'message' => "Login successfully"]);
                            }else{
                                echo json_encode(['success' => true, 'admin' => false , 'message' => "Login successfully"]);
                            }

                        }
                        
                    }else{
                        echo json_encode(['success' => false, 'admin' => false , 'message' => "Wrong Password"]);
                    }
                }else{
                    echo json_encode(['success' => false, 'admin' => false , 'message' => "There is an error"]);
                }
                        
            }
                mysqli_stmt_close($statement);
        }
    }


    function logout(){
        global $connection;

        if(isset($_POST['logout'])){
            session_start();
            $_SESSION = array();
            session_destroy();
            echo json_encode(['success' =>true]);
            
        }else{
            echo json_encode(['success' =>true]);

        }
    }

    function addToCart(){
        global $connection;
        if(session_status() == PHP_SESSION_NONE){
            session_start();
            if(isset($_SESSION['u_id'])){
                $uId = $_SESSION['u_id'];

                if(isset($_POST['add_cart'])){
                    $pId = $_POST['add_cart'];
                    $crQuantity = 1;
                    $sqlQuery = "SELECT * FROM `cart` WHERE `p_id`=$pId";
        
                    $result = mysqli_query($connection, $sqlQuery);
            
                    if(mysqli_num_rows($result) == 0){
            
                        $sqlQuery = "INSERT INTO `cart`(`p_id`, `u_id`, `cr_quantity`) VALUES (?,?,?)";
            
                        if($stmt = mysqli_prepare($connection, $sqlQuery)){
                            mysqli_stmt_bind_param($stmt, "iii", $pId, $uId, $crQuantity);
                            $result =  mysqli_stmt_execute($stmt);
                            if($result){
                                echo json_encode(['success' =>true, 'message' => "Product added!, <a href='./cart.php' target='_blank'>view cart</a>"]);
                            }
                            mysqli_stmt_close($stmt);
                        }
                    }else{
                        echo json_encode(['success' =>false, 'message' => "Product already in the cart!, <a href='./cart.php' target='_blank'>view cart</a>"]);
                    }
                }
            }else{
                echo json_encode(['success' => false, 'message' => "Please <a href='./dashboard/signin.php'>Login</a> to continue"]);
            }
        }
    }

    function removeCart(){
        global $connection;

        if(isset($_POST['cr_id'])){
            $cartId = $_POST['cr_id'];
            $sqlQuery = "DELETE FROM `cart` WHERE `cr_id`=?";
            
            if($stmt = mysqli_prepare($connection, $sqlQuery)){
                mysqli_stmt_bind_param($stmt, "s", $cartId);
                $result = mysqli_stmt_execute($stmt);
                if($result){
                    echo json_encode(['success' => true, 'message' => "Removed!"]);
                }else{
                    echo json_encode(['success' => false, 'message' => "Error Occured!"]);
                }
            }
            mysqli_stmt_close($stmt);
        }
    }
    
    function updateQunatity(){
        global $connection;
        if(isset($_POST['cr_id'])){
            $cartId = $_POST['cr_id'];
            $updatedQuantity = $_POST['cr_value'];
            $sqlQuery = "UPDATE `cart` SET `cr_quantity`=? WHERE `cr_id`=?";
            
            if($stmt = mysqli_prepare($connection, $sqlQuery)){
                mysqli_stmt_bind_param($stmt, "ii", $updatedQuantity, $cartId);
                $result = mysqli_stmt_execute($stmt);
                if($result){
                    // echo json_encode(['success' => true, 'message' => "Removed!"]);
                    echo "Updated!";
                }else{
                    // echo json_encode(['success' => false, 'message' => "Error Occured!"]);
                    echo "Error!";
                }
            }else{
                // echo json_encode(['success' => false, 'message' => "error while preparing statement"]);
                echo "Error while preparing statement";
            }
            mysqli_stmt_close($stmt);
        }else{
            // echo json_encode(['success' => false, 'message' => "cart id not found"]);
            echo "cart id not found ";
        }
    }

    function order(){
        global $connection;
        if(isset($_POST['order'])){
            $udName = $_POST['ud_name'];
            $udEmail = $_POST['ud_email'];
            $udAdress = $_POST['ud_adress'];
            $udPhoneNum = $_POST['ud_phone_num'];
            $udWorkNum = $_POST['ud_work_num'];
            $udDob = $_POST['ud_dob'];
            $udRemarks = $_POST['ud_remarks'];
            $pIds = $_POST['product'];
            $pQuantity = $_POST['quantity'];
            $uId = $_POST['u_id'];
            $cr_id = $_POST['cart'];
    
            // Start transaction
            mysqli_begin_transaction($connection);
    
            try {
                // Inserting into orders to generate invoice
                $sqlQuery = "INSERT INTO `orders`(`u_id`) VALUES (?)";
                $stmt = mysqli_prepare($connection, $sqlQuery);
                mysqli_stmt_bind_param($stmt, "i", $uId);
                mysqli_stmt_execute($stmt);
                if (mysqli_stmt_error($stmt)) {
                    throw new Exception(mysqli_stmt_error($stmt));
                }
    
                // Get the last inserted order ID
                $oId = mysqli_insert_id($connection);
                mysqli_stmt_close($stmt);
    
                // Deleting from cart
                $sqlQuery = "DELETE FROM `cart` WHERE cr_id=?";
                $stmt = mysqli_prepare($connection, $sqlQuery);
                foreach($cr_id as $cartId){
                    mysqli_stmt_bind_param($stmt, "i", $cartId);
                    mysqli_stmt_execute($stmt);
                    if (mysqli_stmt_error($stmt)) {
                        throw new Exception(mysqli_stmt_error($stmt));
                    }
                }
                mysqli_stmt_close($stmt);
    
                // Inserting into order items
                $sqlQuery = "INSERT INTO order_items (o_id, p_id, quantity) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($connection, $sqlQuery);
                for($i = 0; $i < count($pIds); $i++){
                    mysqli_stmt_bind_param($stmt, "iii", $oId, $pIds[$i], $pQuantity[$i]);
                    mysqli_stmt_execute($stmt);
                    if (mysqli_stmt_error($stmt)) {
                        throw new Exception(mysqli_stmt_error($stmt));
                    }
                }
                mysqli_stmt_close($stmt);
    
                // Inserting into user_detail
                $sqlQuery = "INSERT INTO `user_detail`( `ud_name`, `ud_adress`, `ud_email`, `ud_work_num`, `ud_phone_num`, `ud_dob`, `ud_remarks`, `u_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($connection, $sqlQuery);
                mysqli_stmt_bind_param($stmt, "sssssssi", $udName, $udAdress, $udEmail, $udWorkNum, $udPhoneNum, $udDob, $udRemarks, $uId);
                mysqli_stmt_execute($stmt);
                if (mysqli_stmt_error($stmt)) {
                    throw new Exception(mysqli_stmt_error($stmt));
                }
                mysqli_stmt_close($stmt);
    
                // Commit transaction
                mysqli_commit($connection);
                echo json_encode(['success' => true, 'message'=> $oId]);
            } catch (Exception $e) {
                // Rollback transaction in case of error
                mysqli_rollback($connection);
                echo json_encode(['success' => true, 'message' => "Error" . $e->getMessage()]);
            }
        }
    }
    
    function buyNow(){
        global $connection;

        if(session_status() == PHP_SESSION_NONE){
            session_start();
            if(isset($_SESSION['u_id'])){
                $uId = $_SESSION['u_id'];

                if(isset($_POST['buy_now'])){
                    $pId = $_POST['buy_now'];
                    $crQuantity = 1;
                    $sqlQuery = "SELECT * FROM `cart` WHERE `p_id`=$pId";
        
                    $result = mysqli_query($connection, $sqlQuery);
            
                    if(mysqli_num_rows($result) == 0){
            
                        $sqlQuery = "INSERT INTO `cart`(`p_id`, `u_id`, `cr_quantity`) VALUES (?,?,?)";
            
                        if($stmt = mysqli_prepare($connection, $sqlQuery)){
                            mysqli_stmt_bind_param($stmt, "iii", $pId, $uId, $crQuantity);
                            $result =  mysqli_stmt_execute($stmt);
                            if($result){
                                echo json_encode(['success' =>true, 'message' => "Redirecting!"]);
                            }
                            mysqli_stmt_close($stmt);
                        }
                    }else{
                        echo json_encode(['success' =>false, 'message' => "Product already in the cart!, <a href='./cart.php' target='_blank'>view cart</a>"]);
                    }
                }
            }else{
                echo json_encode(['success' => false, 'message' => "Please <a href='./dashboard/signin.php'>Login</a> to continue"]);
            }
        }
    }

    function searching(){
        global $connection;

        if(isset($_POST['s_box'])){
            $searchQuery = '%' . $_POST['s_box'] . '%';
            $sqlQuery = "SELECT * FROM products WHERE p_name LIKE ?";
            $stmt = mysqli_prepare($connection, $sqlQuery);

            mysqli_stmt_bind_param($stmt, "s", $searchQuery);

            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $pId = $row['p_id'];
                    $pName = $row['p_name'];
                    $pImage = $row['p_image'];
                    $pDesc = $row['p_desc'];

                    echo "
                        <li>
                            <a href='./product.php?pId=$pId'>
                                <img src='./uploads/$pImage' alt=''>
                                <div>
                                    <h4>$pName</h4>
                                    <p>$pDesc</p>
                                </div>
                            </a>
                        </li>
                    ";
                }
            }
        }
    }

    // Function to export the database
    function exportDatabase($conn, $database)
    {
        $outputFile = 'database_backup_' . date('Ymd_His') . '.sql';
        $tables = [];
        $result = mysqli_query($conn, "SHOW TABLES");

        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }

        $sqlScript = "SET FOREIGN_KEY_CHECKS=0;\n\n";

        foreach ($tables as $table) {
            // Get the table structure
            $result = mysqli_query($conn, "SHOW CREATE TABLE $table");
            $row = mysqli_fetch_row($result);
            $sqlScript .= "\n\n" . $row[1] . ";\n\n";

            // Get the table data
            $result = mysqli_query($conn, "SELECT * FROM $table");
            $columnCount = mysqli_num_fields($result);

            // Insert data into the table
            while ($row = mysqli_fetch_row($result)) {
                $sqlScript .= "INSERT INTO $table VALUES(";
                for ($j = 0; $j < $columnCount; $j++) {
                    $row[$j] = mysqli_real_escape_string($conn, $row[$j]);
                    if (isset($row[$j])) {
                        $sqlScript .= '"' . $row[$j] . '"';
                    } else {
                        $sqlScript .= 'NULL';
                    }
                    if ($j < ($columnCount - 1)) {
                        $sqlScript .= ',';
                    }
                }
                $sqlScript .= ");\n";
            }
            $sqlScript .= "\n";
        }

        $sqlScript .= "SET FOREIGN_KEY_CHECKS=1;";

        // Save the SQL script to a backup file
        if (!empty($sqlScript)) {
            $backupFile = fopen($outputFile, 'w');
            fwrite($backupFile, $sqlScript);
            fclose($backupFile);
            echo "Database backup successfully saved to $outputFile";
            
            // Prompt the download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($outputFile).'"');
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($outputFile));
            readfile($outputFile);
            exit;
        }
    }





    //Functions calling

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['action'])){
            $action = $_POST['action'];

            if($action == 'registration'){
                registration();
            }else if($action == "login"){
                login();
            }else if($action == "logout"){
                logout();
            }else if($action == "addCart"){
                addToCart();
            }else if($action == "removeCart"){
                removeCart();
            }else if($action == "updateCart"){
                updateQunatity();
            }else if($action == "order"){
                order();
            }else if($action == "buyNow"){
                buyNow();
            }else if($action == "backup"){
                exportDatabase($connection, $dbname);
            }else if($action == "search"){
                searching();
            }
        }
    }
?>

