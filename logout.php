<?php
session_start();

session_unset();

session_destroy();

header("Location: http://localhost/school_project/index.php");

exit;
