<?php
include("helper.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    deleteComment($_POST["comment-id"]);
    header("Location: index.php");
    exit();
}
