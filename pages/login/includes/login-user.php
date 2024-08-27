<?php

include(__DIR__ . "/../../../config/dbconnect.php");
include(__DIR__ . "/../../../utils/password-utils.php");
include(__DIR__ . "/../../../utils/verify-empty-fields.php");

if ($action == "login-user") {
    $userEmail = mysqli_real_escape_string($conn, $_POST['userEmail']);
    $userPass = mysqli_real_escape_string($conn, $_POST['userPass']);
    if (allFieldsNotEmpty($userEmail, $userPass)) {
        $queryLogin = "SELECT userId, userName, userCategory, userPass, userEmail
                       FROM users
                       WHERE userEmail = '" . $userEmail . "'";

        $result = $conn->query($queryLogin);

        $dataUser = mysqli_fetch_array($result);

        $storedHash = $dataUser['userPass'];
        if ($result->num_rows > 0) {
            if (verifyPassword($userPass, $storedHash)) {
                $queryLogged = "UPDATE users 
                                SET userLogged = true
                                WHERE userEmail = '" . $userEmail . "'";

                $conn->query($queryLogged);

                $_SESSION['SESSION_START_TIME'] = time();
                $_SESSION['userLogged'] = true;
                $_SESSION['userName'] = $dataUser['userName'];
                $_SESSION['userCategory'] = $dataUser['userCategory'];

                header("Location:http://localhost/school_project/index.php");
                exit;
            } else {
                echo 'Senha incorreta.';
            }
        } else {
            echo 'Nenhum usuário encontrado com esse e-mail.';
        }
    }
    $conn->close();
}
