<?php
##Author: Cio Loria
##https://github.com/Cioloria

if (isset($_POST["submit"])) {
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    ##Error handler
    //Empty input
    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../signin.php?error=empty");
        exit();
    }

    loginUser($conn, $username, $pwd);
}
else {
    header("location: ../welcome.php");
    exit();
}