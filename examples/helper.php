<?php
ini_set('session.gc_maxlifetime', 3600);
session_start();

include("api.php");

function searchEmail($email)
{
    $jsonData = getUsersData();
    foreach ($jsonData as $user) {
        if ($user["email"] === $email) {
            return $user;
        }
    }
    return null;
}

function generateId($jsonData)
{
    $maxId = 0;
    foreach ($jsonData as $obj) {
        if ($obj["id"] > $maxId) {
            $maxId = $obj["id"];
        }
    }
    return $maxId + 1;
}

function appendUser($newUser)
{
    if (!is_array($newUser)) {
        return;
    }
    global $usersJSON;
    $jsonData = getUsersData();

    $jsonData[] = $newUser;
    file_put_contents($usersJSON, json_encode($jsonData, JSON_PRETTY_PRINT));
}

function login($userData)
{
    $_SESSION["user"] = json_encode($userData, true);
}

function logout()
{
    unset($_SESSION["user"]);
    session_destroy();
}

function appendPost($newPost)
{
    if (!is_array($newPost)) {
        return;
    }
    global $postsJSON;
    $jsonData = getPostsData();

    $jsonData[] = $newPost;
    file_put_contents($postsJSON, json_encode($jsonData, JSON_PRETTY_PRINT));
}

function appendComment($newComment)
{
    if (!is_array($newComment)) {
        return;
    }
    global $commentsJSON;
    $jsonData = getCommentsData();

    $jsonData[] = $newComment;
    file_put_contents($commentsJSON, json_encode($jsonData, JSON_PRETTY_PRINT));
}

function deletePost($postId)
{
    global $postsJSON, $commentsJSON;
    $jsonData = getPostsData();
    foreach ($jsonData as $index => $post) {
        if ($post["id"] === intval($postId)) {
            unset($jsonData[$index]);
            break;
        }
    }
    file_put_contents($postsJSON, json_encode($jsonData, JSON_PRETTY_PRINT));
    $jsonData = getCommentsData();
    foreach ($jsonData as $index => $comment) {
        if ($comment["postId"] === intval($postId)) {
            unset($jsonData[$index]);
        }
    }
    file_put_contents($commentsJSON, json_encode($jsonData, JSON_PRETTY_PRINT));
}

function deleteComment($commentId)
{
    global $commentsJSON;
    $jsonData = getCommentsData();
    foreach ($jsonData as $index => $comment) {
        if ($comment["id"] === intval($commentId)) {
            unset($jsonData[$index]);
            break;
        }
    }
    file_put_contents($commentsJSON, json_encode($jsonData, JSON_PRETTY_PRINT));
}
