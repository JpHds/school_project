<?php
    include("includes/header.php");
    if(!isset($_SESSION['userLogged']) || !$_SESSION['userLogged'] == true) {
        header("Location: http://localhost/school_project/login.php");
    }
?>

    <h1>Content aqui</h1>

<?php
    include("includes/footer.php");
?>