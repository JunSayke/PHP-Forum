<?php
include("helper.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $comment = htmlspecialchars($_POST["comment"]);
    $userData = json_decode($_SESSION["user"], true);
    appendComment([
        "postId" => intval($_POST["post-id"]),
        "id" => generateId(getCommentsData()),
        "name" => $userData["name"],
        "email" => $userData["email"],
        "body" => $comment
    ]);
    header("Location: index.php");
    exit();
}
