<?php

/**
 * Cria um hash seguro para uma senha usando bcrypt
 *
 * @param string $pass A senha a ser hasheada.
 * @param string $hashAlgoritm O algoritmo de hash a ser usado (bcrypt ou Argon2).
 * @return string O hash da senha.
 */
function createPasswordHash($pass, $hashAlgoritm = PASSWORD_BCRYPT) {
    return password_hash($pass, $hashAlgoritm);
}

/**
 * Verifica se a senha fornecida corresponde ao hash armazenado.
 *
 * @param string $pass A senha fornecida pelo usuário.
 * @param string $hash O hash armazenado no banco de dados.
 * @return bool Verdadeiro se a senha corresponder ao hash, falso caso contrário.
 */
function verifyPassword($pass, $hash) {
    return password_verify($pass, $hash);
}
?>