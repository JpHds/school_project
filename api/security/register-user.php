<?php

include("../../config/dbconnect.php");
include("../../utils/password_utils.php");


$userName = mysqli_real_escape_string($conn, $_POST['userName']);
$userEmail =  mysqli_real_escape_string($conn, $_POST['userEmail']);
$userBirth =  mysqli_real_escape_string($conn, $_POST['userBirth']);
$userPass =  mysqli_real_escape_string($conn, $_POST['userPass']);
$userCategory = mysqli_real_escape_string($conn, $_POST['userCategory']);
$userCpf = mysqli_real_escape_string($conn, $_POST['userCpf']);

$queryVerifyEmail = "SELECT *
                FROM users
                WHERE userEmail = '" . $userEmail . "'";
$dataVerifyEmail = $conn->query($queryVerifyEmail);

$hashedPass = createPasswordHash($userPass);

if ($dataVerifyEmail->num_rows > 0) {
    header("Location: http://localhost/school_project/register.php?errorRegister");
    exit;
} else {
    $queryRegister = "INSERT INTO users
                  (userName, userEmail, userBirth, userPass, userCategory, userCpf, userCreatedAt)
                  VALUES(
                  '" . $userName . "',
                  '" . $userEmail . "',
                  '" . $userBirth . "',
                  '" . $hashedPass . "',
                  '" . $userCategory . "',
                  '" . $userCpf . "',
                  NOW())
                  ";
    $conn->query($queryRegister);
    header("Location:http://localhost/school_project/login.php?sucessRegister");
    exit;
}

$conn->close();
