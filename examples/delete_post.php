<?php
include("helper.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    deletePost($_POST["post-id"]);
    header("Location: index.php");
    exit();
}
