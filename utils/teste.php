<?php
include 'password-utils.php'; // Certifique-se de que este arquivo está incluído

$password = "minhaSenhaSecreta";
$hash = createPasswordHash($password);

echo "Hash criado: " . htmlspecialchars($hash) . "<br>";

if (verifyPassword($password, $hash)) {
    echo "Senha verificada com sucesso!";
} else {
    echo "Falha na verificação da senha.";
}
?>
