<?php

    //Initializing user details
    $uName = $_SESSION['u_name'];
    // $uRole = $_SESSION['u_role'];
?>
<!DOCTYPE html>
<html lang="en" ng-app="dashboard">

<head>
    <meta charset="utf-8">
    <title>Admin Panel | Jenny's Store</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <script src="lib/jquery-3.4.1.min.js"></script>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="lib/fontawesome-free-6.4.2-web/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<?php
    require_once("../config/database-con.php");
    require_once("../config/validations.php");
?>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="../index.php" target="_blank" title="Visit Web" class="navbar-brand logo mx-4 mb-3">
                    <div>
                        <img src="../images/logo-01-01.png" alt="">
                    </div>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $uName ?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="../index.php" target="_blank" class="nav-item nav-link"><i class="fa fa-eye me-2"></i>View Store</a>
                    <a href="?url=overview" class="nav-item nav-link <?php if(isset($_GET['url'])){ $_GET['url'] == "overview"? print("active") : "active";} ?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle  <?php if(isset($_GET['url'])){ $_GET['url'] == "add-product" ? print("active") : ($_GET['url'] == "update-product" ? print("active") : ($_GET['url'] == "delete-product" ? print("active"): ""));} ?> " data-bs-toggle="dropdown"><i class="fa fa-box me-2"></i>Products</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="?url=add-product" class="dropdown-item">Add Product</a>
                            <a href="?url=update-product" class="dropdown-item">Update Product</a>
                            <a href="?url=delete-product" class="dropdown-item">Delete Product</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if(isset($_GET['url'])){ $_GET['url'] == "add-category" ? print("active") : ($_GET['url'] == "upd-cat" ? print("active") : ($_GET['url'] == "del-cat" ? print("active"): ""));} ?> " data-bs-toggle="dropdown"><i class="fa fa-list me-2"></i>Categories</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="?url=add-category" class="dropdown-item">Add Category</a>
                            <a href="?url=upd-cat" class="dropdown-item">Update Category</a>
                            <a href="?url=del-cat" class="dropdown-item">Delete Category</a>
                        </div>
                    </div>

                    <a href="?url=user" class="nav-item nav-link <?php if(isset($_GET['url'])){ $_GET['url'] == "user" ? print("active") : "";} ?>"><i class="fa fa-users me-2"></i>Users</a>
                    
                    <a href="?url=orders" class="nav-item nav-link <?php if(isset($_GET['url'])){ $_GET['url'] == "orders" ? print("active") : "";} ?>"><i class="fa fa-table me-2"></i>Orders</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if(isset($_GET['url'])){ $_GET['url'] == "top-user" ? print("active") : ($_GET['url'] == "top-prod" ? print("active") : "" );} ?> " data-bs-toggle="dropdown"><i class="fa fa-list me-2"></i>Reports</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="?url=top-user" class="dropdown-item">Top 10 Users</a>
                            <a href="?url=top-prod" class="dropdown-item">Top 10 Products</a>
                            <a class="dropdown-item">
                                <form style="padding:0;margin:0;" action="../config/validations.php" id="backup" method="post">
                                    <input type="hidden" name="action" value="backup">
                                    <button style="border:none; background:transparent; color: #fff">Backup Database</button>
                                </form>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">
            
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $uName ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <form id="logout">
                                <input type="hidden" name="logout" id="">
                                <button class="dropdown-item">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
                <?php
                    if(isset($_GET['url'])){
                        $pageURL = $_GET['url'];


                        switch($pageURL){
                            case "add-product":
                                include_once("components/add-product.php");
                            break;
                            case "add-category":
                                include_once("components/add-cat.php");
                            break;
                            case "overview":
                                include_once("components/overview.php");
                            break;
                            case "update-product":
                                include_once("components/update-product.php");
                            break;
                            case "delete-product":
                                include_once("components/delete-product.php");
                            break;
                            case "upd-cat":
                                include_once("components/upd-cat.php");
                            break;
                            case "del-cat":
                                include_once("components/del-cat.php");
                            break;
                            case "user":
                                include_once("components/users.php");
                            break;
                            case "orders":
                                include_once("components/orders.php");
                            break;
                            case "top-user":
                                include_once("components/top-user.php");
                            break;
                            case "top-prod":
                                include_once("components/top-prod.php");
                            break;
                            
                        }
                            
                    }else{
                        include_once("components/overview.php");
                    }
                ?>
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    
    <script src="js/main.js"></script>
    <!-- Ajax Requests -->
    <script src="../js/custom.js"></script>
    <script src="../js/ajax.js"></script>

    
</body>

</html>