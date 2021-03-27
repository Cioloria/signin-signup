<?php
##Author: Cio Loria
##https://github.com/Cioloria

##signup.php
##Checking for errors

##Check empty input
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

##Check pattern
function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

##Check valid email
function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

##Check repeat password
function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

##Check if email exist in dB
function emailExists($conn, $email) {
    $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    //Prepared statment
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    //Grab data from $stmt
    $resultData = mysqli_stmt_get_result($stmt);

    //Check if there is result in $stmt
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

##Check if username exist in dB
function uidExists($conn, $username) {
    $sql = "SELECT * FROM users WHERE usersUid = ?;";
    //Prepared statment
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    //Grab data from $stmt
    $resultData = mysqli_stmt_get_result($stmt);

    //Check if there is result in $stmt
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

##Function to create users
function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?,?,?,?);";
    //Prepared statment
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    // Hashing password - unreadable
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../success.php");
    exit();
}

##login.inc.php
##Checking for errors

##Check empty input
function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

##Check if user already exist
function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username);
    //User doesn't exist
    if ($uidExists === false ) {
        header("location: ../signin.php?error=wronglogin");
        exit();
    }
    //Check hashpassword
    $pwdHashed = $uidExists ["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);
    //Check for wrong password
    if ($checkPwd === false) {
        header("location: ../signin.php?error=wronglogin");
        exit();
    }
    else if  ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists ["usersId"];
        $_SESSION["useruid"] = $uidExists ["usersUid"];
        header("location: ../welcome.php");
        exit();
    }
}