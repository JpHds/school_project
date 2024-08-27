<?php
include("config/config.php");

if (isset($_SESSION['userLogged']) && $_SESSION['userLogged'] == true) {
    header("Location:http://localhost/school_project/index.php");
}

$action = isset($_GET['action']) ? $_GET['action'] : '';

include("pages/login/includes/login-user.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Entrar</title>
    <style>
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 4px;
        }

        .btn-login {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }

        .full-height {
            min-height: 100vh;
        }
    </style>
</head>

<body>

    <?php

    if (isset($_GET['sucessRegister'])) {
        echo '<div class="container mt-4">
                    <div class="alert alert-success" role="alert">
                        Usuário cadastrado com sucesso!
                    </div>
                </div>';
    }
    ?>

    <div class="container-fluid d-flex justify-content-center align-items-center full-height">
        <div class="login-container border bg-light">
            <h1 class="text-center mb-4">Entrar</h1>
            <form action="?action=login-user" method="POST">
                <div class="form-group">
                    <label for="userEmail">E-mail:</label>
                    <input type="email" name="userEmail" id="userEmail" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="userPass">Senha:</label>
                    <input type="password" name="userPass" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-login">Entrar</button>
            </form>
            <div class="text-center mt-3">
                <p class="mb-0">Não possui uma conta? <a href="register.php" class="btn btn-link">Cadastrar-se</a></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>