<?php
$USERS_JSON_PATH = "../data/users.json";
$POSTS_JSON_PATH = "../data/posts.json";
$COMMENTS_JSON_PATH = "../data/comments.json";

function searchUserByUsername($username)
{
    global $USERS_JSON_PATH;
    $userData = json_decode(file_get_contents($USERS_JSON_PATH));
    foreach ($userData as $user) {
        if ($user->username === $username) {
            return $user;
        }
    }
    return null;
}
