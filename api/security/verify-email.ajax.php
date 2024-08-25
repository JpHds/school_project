<?php

include("../../config/dbconnect.php");

header('Content-Type: application/json');

$userEmail = mysqli_real_escape_string($conn, $_POST['userEmail']);

$queryVerifyEmail = "SELECT userEmail
                     FROM users
                     WHERE userEmail = '" . $userEmail . "'";

$result = $conn->query($queryVerifyEmail);

if ($result->num_rows > 0) {
    $emailExists = true;
} else {
    $emailExists = false;
}


echo json_encode(['exists' => $emailExists]);

$conn->close();
