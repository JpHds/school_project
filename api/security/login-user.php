<?php

include("../../config/dbconnect.php");
include("../../config//config.php");
include("../../utils/password_utils.php");

$userEmail = mysqli_real_escape_string($conn, $_POST['userEmail']);
$userPass = mysqli_real_escape_string($conn, $_POST['userPass']);


$queryLogin = "SELECT *
               FROM users
               WHERE userEmail = '" . $userEmail . "'";

$result = $conn->query($queryLogin);

if ($result->num_rows > 0) {
    $dataUser = mysqli_fetch_array($result);
    $storedHash = $dataUser['userPass'];
    if (verifyPassword($userPass, $storedHash)) {
        $queryLogged = "UPDATE users 
                        SET userLogged = true
                        WHERE userEmail = '" . $userEmail . "'";

        $conn->query($queryLogged);
    }

    $_SESSION['userLogged'] = true;
    $_SESSION['userName'] = $dataUser['userName'];
    $_SESSION['userCategory'] = $dataUser['userCategory'];

    header("Location:http://localhost/school_project/index.php");
    exit;
}

$conn->close();
