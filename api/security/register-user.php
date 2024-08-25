<?php

include("../../config/dbconnect.php");

$userName = mysqli_real_escape_string($conn, $_POST['userName']);
$userEmail = mysqli_real_escape_string($conn, $_POST['userEmail']);
$userBirth = mysqli_real_escape_string($conn, $_POST['userBirth']);
$userPass = mysqli_real_escape_string($conn, $_POST['userPass']);
$userCategory = mysqli_real_escape_string($conn, $_POST['userCategory']);

$queryVerify = "SELECT *
                FROM users
                WHERE userEmail = '" . $userEmail . "'";
$dataVerify = $conn->query($queryVerify);

if ($dataVerify->num_rows > 0) {
    header("Location: http://localhost/school_project/register.php?errorRegister");
    exit;
} else {
    $queryRegister = "INSERT INTO users
                  (userName, userEmail, userBirth, userPass, userCategory, userCreatedAt)
                  VALUES(
                  '" . $userName . "',
                  '" . $userEmail . "',
                  '" . $userBirth . "',
                  '" . $userPass . "',
                  '" . $userCategory . "',
                  NOW())
                  ";
    $conn->query($queryRegister);
    header("Location: http://localhost/school_project/login.php?sucessRegister");
    exit;
}