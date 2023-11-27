<?php
include_once("api.php");

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

function appendUser($userData)
{
    if (!is_array($userData)) {
        return;
    }
    global $usersJSON;
    $jsonData = getUsersData();

    $maxId = 0;
    foreach ($jsonData as $user) {
        if ($user["id"] > $maxId) {
            $maxId = $user["id"];
        }
    }
    $newUser = [
        "id" => $maxId + 1,
        "name" => $userData["name"],
        "username" => $userData["username"],
        "email" => $userData["email"],
        "address" => [
            "street" => $userData["street"],
            "barangay" => $userData["barangay"],
            "city" => $userData["city"]
        ]
    ];
    $jsonData[] = $newUser;
    file_put_contents($usersJSON, json_encode($jsonData, JSON_PRETTY_PRINT));
}
