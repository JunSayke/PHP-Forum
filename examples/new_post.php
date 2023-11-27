<?php
include("helper.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postTitle = htmlspecialchars($_POST["post-title"]);
    $postContent = htmlspecialchars($_POST["post-content"]);
    $userData = json_decode($_SESSION["user"], true);
    appendPost([
        "uid" => $userData["id"],
        "id" => generateId(getPostsData()),
        "title" => $postTitle,
        "body" => $postContent
    ]);
    header("Location: index.php");
    exit();
}
