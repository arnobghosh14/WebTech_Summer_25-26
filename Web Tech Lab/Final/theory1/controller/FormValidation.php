<?php

$username ="";
$email ="";
$password ="";
$website ="";
$comment ="";
$gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $website = trim($_POST["website"]);
    $comment = trim($_POST["comment"]);
    $gender = trim($_POST["gender"]);

    if (empty($username) || strlen($username) < 5) {
        echo "Username is required and must be at least 5 characters long";
    }

    if (empty($email) || strpos($email, "@gmail.com") === false) {
        echo "Email is required and must contain '@gmail.com'";
    }

    if (empty($password) || strlen($password) < 8) {
        echo "Password is required and must be at least 8 characters long";
    }
    if (empty($website) || strlen($website) < 10) {
        echo "Website is required and must be at least 10 characters long";
    }
    if (empty($comment)) {
        echo "Comment is required and cannot be empty";
    }
}
?>