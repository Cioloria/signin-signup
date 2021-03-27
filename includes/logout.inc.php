<?php
##Author: Cio Loria
##https://github.com/Cioloria

session_start();
session_unset();
session_destroy();
//Redirected back to signin.php
header("location: ../signin.php");
exit();