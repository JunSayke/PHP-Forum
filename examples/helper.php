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

function generateUserId()
{
    $jsonData = getUsersData();
    $maxId = 0;
    foreach ($jsonData as $user) {
        if ($user["id"] > $maxId) {
            $maxId = $user["id"];
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
