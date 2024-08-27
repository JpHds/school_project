<?php

session_start();

date_default_timezone_set('America/Sao_Paulo');

$timeToDisconnectUser = 10;

if (isset($_SESSION['SESSION_START_TIME'])) {
    $timeLogged = time() - $_SESSION['SESSION_START_TIME'];

    if ($timeLogged > $timeToDisconnectUser) {
        session_unset();
        session_destroy();
        exit;
    } else {
        $_SESSION['SESSION_START_TIME'] = time();
    }
} else {
    $_SESSION['SESSION_START_TIME'] = time();
}
