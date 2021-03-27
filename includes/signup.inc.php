<?php
##Author: Cio Loria
##https://github.com/Cioloria

if (isset($_POST["submit"])) {

$name = $_POST["name"];
$email = $_POST["email"];
$username = $_POST["uid"];
$pwd = $_POST["pwd"];
$pwdRepeat = $_POST["pwdrepeat"];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

##Error handler
//Empty input
if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
    header("location: ../signup.php?error=empty");
    exit();
}
//Invalid username
if (invalidUid($username) !== false) {
    header("location: ../signup.php?error=invalidUid");
    exit();
}
//Invalid email
if (invalidEmail($email) !== false) {
    header("location: ../signup.php?error=invalidEmail");
    exit();
}
//Password repeat doesn't match
if (pwdMatch($pwd, $pwdRepeat) !== false) {
    header("location: ../signup.php?error=passworddontmatch");
    exit();
}
//Email already taken
if (emailExists($conn, $email) !== false) {
    header("location: ../signup.php?error=emailtaken");
    exit();
}
//Username already taken
if (uidExists($conn, $username) !== false) {
    header("location: ../signup.php?error=usernametaken");
    exit();
}

createUser($conn, $name, $email, $username, $pwd);

}
else {
    header("location: ../success.php");
    exit();
}