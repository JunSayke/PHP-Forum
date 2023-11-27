<?php
include_once("helper.php");
?>
<header class="p-3 mb-5 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Posts</a></li>
            </ul>
            <div class="text-end">
                <?php
                if (isset($_SESSION["user"])) {
                    $userData = json_decode($_SESSION["user"], true);
                    echo '<span class="text-secondary me-2">Welcome ' . $userData["name"] . ' </span>
                        <a type="button" class="btn btn-danger" href="logout.php">Logout</a>';
                } else {
                    echo '<a type="button" class="btn btn-outline-light me-2" href="login.php">Login</a>
                            <a type="button" class="btn btn-warning" href="register.php">Sign-up</a>';
                }
                ?>
            </div>
        </div>
    </div>
</header>