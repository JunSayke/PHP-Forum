<?php
include("helper.php");
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


        <?php
        if (isset($_SESSION["user"])) {
            echo '<form action="new_post.php" method="post">
                    <div class="mb-3">
                        <label for="post-title" class="form-label">Post Title: </label>
                        <input type="text" class="form-control" id="post-title" name="post-title"></input>
                    </div>
                    <div class="mb-3">
                        <label for="post-content" class="form-label">Post Content: </label>
                        <textarea class="form-control" id="post-content" name="post-content" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>';
        }

        echo getPosts();
        ?>
    </div>
</body>

</html>