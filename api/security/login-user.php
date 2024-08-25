<?php

include("../../config/dbconnect.php");
include("../../config/config.php");

$userEmail = mysqli_real_escape_string($conn, $_POST['userEmail']);
$userPass = mysqli_real_escape_string($conn, $_POST['userPass']);

$queryLogin = "SELECT *
               FROM users
               WHERE userEmail = '" . $userEmail . "'
               AND userPass = '" . $userPass . "'";

$result = $conn->query($queryLogin);

if ($result->num_rows > 0) {
    $queryLogged = "UPDATE users 
                    SET userLogged = true
                    WHERE userEmail = '" . $userEmail . "'";

    $conn->query($queryLogged);

    while ($dataUser = mysqli_fetch_array($result)) {
        $_SESSION['userLogged'] = true;
        $_SESSION['userName'] = $dataUser['userName'];
        $_SESSION['userCategory'] = $dataUser['userCategory'];
    }
    header("Location: http://localhost/school_project/index.php");
    exit;
}

$conn->close();
