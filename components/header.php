<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    $current_page = basename($_SERVER['SCRIPT_NAME']);
?>

<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

<div class="container">
    <a class="navbar-brand" href="index.php">
        <img src="./images/logo-01-01.png" style="width: 144px;" alt="">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsFurni">
        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
            <li class="nav-item <?php echo $current_page == "index.php" ? "active" : "" ; ?>">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="<?php echo $current_page == "shop.php" ? "active" : "" ; ?>"><a class="nav-link " href="shop.php">Shop</a></li>
            <li class="<?php echo $current_page == "about.php" ? "active" : "" ; ?>"><a class="nav-link" href="about.php">About us</a></li>
            <li class="<?php echo $current_page == "contact.php" ? "active" : "" ; ?>"><a class="nav-link" href="contact.html">Contact us</a></li>
            <li><a class="nav-link" href="#" onclick="openSearch()"><i class="fa-solid fa-magnifying-glass"></i></a></li>
        </ul>

        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
            <?php if(isset($_SESSION['u_id'])){ ?>
                    
                        <li class='dropdown'>
                            <a class='dropdown-toggle nav-link' href='#' data-bs-toggle='dropdown'><i class='fa fa-user'></i> Account</a>
                                <ul class='dropdown-menu bg-secondary'>
                                    <li><a class='dropdown-item' href='./cart.php'>Cart</a></li>
                                    <li>
                                        <button onclick="logout()" class="dropdown-item">Logout</button>
                                    </li>
                                </ul>
                        </li>
            <?php }else{ ?>
                        <li><a class=' btn btn-white-outline' href='./dashboard/signin.php'>Login <i class='fa fa-right-to-bracket'></i></a></li>
                        <li><a class='btn btn-secondary ' href='./dashboard/signup.php'>Signup <i class='fa fa-user-plus'></i></a></li>
            <?php } ?>
        </ul>
    </div>
</div>
</nav>

<div style="top:-100%" id="search-box">
    <button onclick="closeSearch()">
        <i class="fa-solid fa-close"></i>
    </button>
    <div class="search-div">
        <input placeholder="Search Products" type="text" name="s_box" id="search">
        <ul id="search-result">
            
        </ul>
    </div>
    
</div>