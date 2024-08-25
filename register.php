<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Cadastre-se</title>
    <style>
        .full-height {
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="container-fluid full-height d-flex justify-content-center align-items-center">
        <div class="p-5 border bg-light w-50">
            <h1 class="text-center">Registre-se</h1>
            <form action="/school_project/api/security/register-user.php" method="POST">
                <div class="form-group">
                    <label for="userName">Nome:</label>
                    <input type="text" name="userName" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="userEmail">E-mail:</label>
                    <input type="email" name="userEmail" id="userEmail" class="form-control" required onblur="verifyEmail(this.value)">
                </div>
                <div id="emailWarning" class="alert alert-danger mt-2 d-none" role="alert">
                    Esse e-mail já está em uso.
                </div>
                <div class="form-group">
                    <label for="userBirth">Data de Nascimento:</label>
                    <input type="date" name="userBirth" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="userPassword">Senha:</label>
                    <input type="password" name="userPassword" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="userCategory">Categoria:</label>
                    <select name="userCategory" class="form-control" required>
                        <option value="">Selecione uma categoria</option>
                        <option value="teacher">Professor</option>
                        <option value="student">Aluno</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>



<script>
    function verifyEmail(email) {
        $.ajax({
            url: "api/security/verify-email.php",
            method: "POST",
            data: {
                userEmail: email
            },
            success: function(response) {
                if (response.exists) {
                    $('#emailWarning').removeClass('d-none');
                } else {
                    $('#emailWarning').addClass('d-none');
                }
            },
            error: function(xhr, status, error) {
                console.error('Erro: ' + status + ' - ' + error);
            }
        });
    }
</script>

</html>

<?php

include("api/security/register-user.php");

?>