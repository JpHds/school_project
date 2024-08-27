<?php

include(__DIR__ . "/../../../config/dbconnect.php");
include(__DIR__ . "/../../../utils/password-utils.php");
include(__DIR__ . "/../../../utils/verify-empty-fields.php");

if ($action == "register-user") {
    $userName = isset($_POST['userName']) ? mysqli_real_escape_string($conn, $_POST['userName']) : null;
    $userEmail = isset($_POST['userEmail']) ? mysqli_real_escape_string($conn, $_POST['userEmail']) : null;
    $userBirth = isset($_POST['userBirth']) ? mysqli_real_escape_string($conn, $_POST['userBirth']) : null;
    $userPass = isset($_POST['userPass']) ? mysqli_real_escape_string($conn, $_POST['userPass']) : null;
    $userCategory = isset($_POST['userCategory']) ? mysqli_real_escape_string($conn, $_POST['userCategory']) : null;
    $userCpf = isset($_POST['userCpf']) ? mysqli_real_escape_string($conn, $_POST['userCpf']) : null;

    $queryVerifyEmail = "SELECT *
                     FROM users
                     WHERE userEmail = '" . $userEmail . "'";
    $dataVerifyEmail = $conn->query($queryVerifyEmail);

    $hashedPass = createPasswordHash($userPass);

    if ($dataVerifyEmail->num_rows > 0) {
        header("Location: http://localhost/school_project/register.php?errorRegister");
        exit;
    } else if (allFieldsNotEmpty($userName, $userEmail, $userBirth, $userPass, $userCategory, $userCpf)) {
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
}
