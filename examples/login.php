<?php
include("helper.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $existingUser = searchEmail($email);
    if ($existingUser) {
        header("Location: index.php");
        exit();
    }
    header("Location: ?login_error");
    exit();
}
?>

<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='styles.css'>
</head>

<body>
    <?php
    include("header.php");
    ?>
    <div class="container">
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <?php
            // Display an error message if login error parameter is present
            if (isset($_GET['login_error'])) {
                echo '<div class="alert alert-danger mt-3" role="alert">Login failed. Please check your credentials and try again.</div>';
            }
            ?>
        </form>
    </div>
</body>

</html>