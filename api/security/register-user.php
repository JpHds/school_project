<?php

include("../../config/dbconnect.php");

$userName = mysqli_real_escape_string($conn, $_POST['userName']);
$userEmail = mysqli_real_escape_string($conn, $_POST['userEmail']);
$userBirth = mysqli_real_escape_string($conn, $_POST['userBirth']);
$userPass = mysqli_real_escape_string($conn, $_POST['userPassword']);
$userCategory = mysqli_real_escape_string($conn, $_POST['userCategory']);

$queryVerify = "SELECT *
                FROM users
                WHERE userEmail = '" . $userEmail . "'";
$dataVerify = $conn->query($queryVerify);

if($dataVerify->num_rows > 0) {
    die ("Erro ao inserir usuário: " . $conn->error);
} else {
    $queryRegister = "INSERT INTO users
                  (userName, userEmail, userBirth, category, createdAt)
                  VALUES(
                  '" . $userName ."',
                  '" . $userEmail ."',
                  '" . $userBirth ."',
                  '" . $userCategory ."',
                  NOW())
                  ";
}


$conn->query($queryRegister);
